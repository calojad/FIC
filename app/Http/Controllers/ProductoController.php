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
    /*
     * Mis Funciones del objeto Productos
     */
    // Listado de productos segun el codigo
    public function getAutocompletecodigo(Request $request){
        $search = $request->term;
        $productos = Producto::where('codigo','LIKE',$search.'%')
            ->get();
        count($productos) !== 0 ? $lista = $productos : $lista = [0 => ['codigo'=>'No hay datos']];
        return response($lista);
    }
    // Listado de productos segun el nombre
    public function getAutocompletenombre(Request $request){
        $search = $request->term;
        $productos = Producto::where('nombre','LIKE','%'.$search.'%')
            ->get();
        count($productos) !== 0 ? $lista = $productos : $lista = [0 => ['nombre'=>'No hay datos']];
        return response($lista);
    }
    public function getModallista(){
        $productos = Producto::all();
        return view('facturacion.modals.listaProductos',compact('productos'));
    }
}