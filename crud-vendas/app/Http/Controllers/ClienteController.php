<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
{

    public function index()
    {
        $clients = Cliente::all()->makeHidden(['deleted_at']);
        
        return view('pages.cliente.index',['title' => 'Clientes', 'clients' => $clients->toArray()]);
    }

    public function create()
    {
        return view('pages.cliente.create', ['title' => 'Novo Cliente']);
    }

    public function store(StoreClienteRequest $request)
    {

        $validatedData = $request->validated();

        Cliente::create($validatedData);

        return redirect()->route('cliente.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function edit(string $id)
    {
        $client = Cliente::find($id);
        
        return view('pages.cliente.edit', ['title' => 'Editar Cliente', 'client' => $client]);
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {

        $validatedData = $request->validated();

        $cliente->update($validatedData);

        return redirect()->route('cliente.index')->with('success', 'Cliente atualizado com sucesso!');
    }
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente deletado com sucesso!');
    }
}
