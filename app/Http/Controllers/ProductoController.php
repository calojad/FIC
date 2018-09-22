<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use App\Repositories\ProductoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductoController extends AppBaseController
{
    /** @var  ProductoRepository */
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepo)
    {
        $this->productoRepository = $productoRepo;
    }
    /**
     * Display a listing of the Producto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productoRepository->pushCriteria(new RequestCriteria($request));
        $productos = $this->productoRepository->all();
        return view('productos.index')->with('productos', $productos);
    }
    /**
     * Show the form for creating a new Producto.
     *
     * @return Response
     */
    public function create()
    {
        return view('productos.create');
    }
    /**
     * Store a newly created Producto in storage.
     *
     * @param CreateProductoRequest $request
     *
     * @return Response
     */
    public function store(CreateProductoRequest $request)
    {
        $input = $request->all();
        $producto = $this->productoRepository->create($input);
        Flash::success('Producto saved successfully.');
        return redirect(route('productos.index'));
    }
    /**
     * Display the specified Producto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $producto = $this->productoRepository->findWithoutFail($id);
        if (empty($producto)) {
            Flash::error('Producto not found');
            return redirect(route('productos.index'));
        }
        return view('productos.show')->with('producto', $producto);
    }
    /**
     * Show the form for editing the specified Producto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $producto = $this->productoRepository->findWithoutFail($id);
        if (empty($producto)) {
            Flash::error('Producto not found');
            return redirect(route('productos.index'));
        }
        return view('productos.edit')->with('producto', $producto);
    }
    /**
     * Update the specified Producto in storage.
     *
     * @param  int $id
     * @param UpdateProductoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductoRequest $request)
    {
        $producto = $this->productoRepository->findWithoutFail($id);
        if (empty($producto)) {
            Flash::error('Producto not found');
            return redirect(route('productos.index'));
        }
        $producto = $this->productoRepository->update($request->all(), $id);
        Flash::success('Producto updated successfully.');
        return redirect(route('productos.index'));
    }
    /**
     * Remove the specified Producto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $producto = $this->productoRepository->findWithoutFail($id);
        if (empty($producto)) {
            Flash::error('Producto not found');
            return redirect(route('productos.index'));
        }
        $this->productoRepository->delete($id);
        Flash::success('Producto deleted successfully.');
        return redirect(route('productos.index'));
    }

    public function autocompletecodigo(Request $request){
        $auto_productos = [0=>'No hay datos'];
        $search = $request->term;
        $productos = Producto::where('codigo','LIKE',$search.'%')
            ->get();
        if(count($productos)!=0){
            $auto_productos=null;
            foreach ($productos as $producto){
                $auto_productos[] = [
                    'value' => $producto->id,
                    'label' => $producto->codigo,
                    'name' => $producto->nombre,
                    'precio' => $producto->precio
                ];
            }
        }
        return response($auto_productos);
    }

    public function autocompletenombre(Request $request){
        $auto_productos = [0=>'No hay datos'];
        $search = $request->term;
        $productos = Producto::where('nombre','LIKE','%'.$search.'%')
            ->get();
        if(count($productos)!=0){
            $auto_productos=null;
            foreach ($productos as $producto){
                $auto_productos[] = [
                    'value' => $producto->id,
                    'label' => $producto->nombre,
                    'codigo' => $producto->codigo,
                    'precio' => $producto->precio
                ];
            }
        }
        return response($auto_productos);
    }
}