<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{

    public function index()
    {
        $clients = Cliente::all()->makeHidden(['deleted_at']);
        
        return view('cliente.index',['title' => 'Clientes', 'clients' => $clients->toArray()]);
    }

    public function store(Request $request)
    {
        
        $rules = [
            'nome' => 'required',
            'cpf' => 'required|digits:11',
            'sexo' => 'required|in:M,F',
            'email' => 'required|email'
        ];

        $feedbacks = [
            'nome' => 'O campo nome precisa ser preenchido',
            'cpf' =>'O campo cpf dever ser preenchido com 11 caracteres numerais',
            'sexo' => 'O campo sexo precisa ser preenchido',
            'email' => 'o campo e-mail precisa ser preenchido',
        ];

        $validatedData = $request->validate($rules, $feedbacks);

        Cliente::create($validatedData);

        return redirect()->route('cliente.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function update(Request $request, Cliente $cliente)
    {
        $rules = [
            'nome' => 'required',
            'cpf' => 'required|digits:11',
            'sexo' => 'required|in:M,F',
            'email' => 'required|email'
        ];

        $feedbacks = [
            'nome' => 'O campo nome precisa ser preenchido',
            'cpf' =>'O campo cpf dever ser preenchido com 11 caracteres numerais',
            'sexo' => 'O campo sexo precisa ser preenchido',
            'email' => 'o campo e-mail precisa ser preenchido',
        ];

        $validatedData = $request->validate($rules, $feedbacks);

        $cliente->update($validatedData);

        return redirect()->route('cliente.index')>with('success', 'Cliente atualizado com sucesso!');
    }
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente deletado com sucesso!');
    }
}
