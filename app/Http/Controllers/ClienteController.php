<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ClienteController extends AppBaseController
{
    /** @var  ClienteRepository */
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepo)
    {
        $this->clienteRepository = $clienteRepo;
    }

    /**
     * Display a listing of the Cliente.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clienteRepository->pushCriteria(new RequestCriteria($request));
        $clientes = $this->clienteRepository->all();
        return view('clientes.index')
            ->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new Cliente.
     *
     * @return Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created Cliente in storage.
     *
     * @param CreateClienteRequest $request
     *
     * @return Response
     */
    public function store(CreateClienteRequest $request)
    {
        $input = $request->all();
        $cliente = $this->clienteRepository->create($input);
        Flash::success('Cliente saved successfully.');
        return redirect(route('clientes.index'));
    }

    /**
     * Display the specified Cliente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);
        if (empty($cliente)) {
            Flash::error('Cliente not found');
            return redirect(route('clientes.index'));
        }
        return view('clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified Cliente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);
        if (empty($cliente)) {
            Flash::error('Cliente not found');
            return redirect(route('clientes.index'));
        }
        return view('clientes.edit')->with('cliente', $cliente);
    }

    /**
     * Update the specified Cliente in storage.
     *
     * @param  int $id
     * @param UpdateClienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClienteRequest $request)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);
        if (empty($cliente)) {
            Flash::error('Cliente not found');
            return redirect(route('clientes.index'));
        }
        $cliente = $this->clienteRepository->update($request->all(), $id);
        Flash::success('Cliente updated successfully.');
        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified Cliente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);
        if (empty($cliente)) {
            Flash::error('Cliente not found');
            return redirect(route('clientes.index'));
        }
        $this->clienteRepository->delete($id);
        Flash::success('Cliente deleted successfully.');
        return redirect(route('clientes.index'));
    }
    /*
     * Mis funciones del objeto cliente
     */
    public function getAutocompletecedula(Request $request)
    {
        $search = $request->term;
        $clientes = Cliente::where('cedula', 'LIKE', $search . '%')
            ->get();
        count($clientes) !== 0 ? $lista = $clientes : $lista = [0 => ['cedula'=>'No hay datos']];

        return response($lista);
    }
}
