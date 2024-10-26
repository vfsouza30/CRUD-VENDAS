<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('cliente.index',['title' => 'Clientes', 'client' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required',
            'cpf' => 'required|min:11|max:11',
            'sexo' => 'required',
            'email' => 'required'
        ];

        $feedbacks = [
            'nome' => 'O campo nome precisa ser preenchido',
            'cpf' =>'O campo dever ser preenchido com 11 caracteres numerais',
            'sexo' => 'O campo sexo precisa ser preenchido',
            'email' => 'o campo e-mail precisa ser preenchido',
        ];

        $request->validate($regras, $feedbacks);

        Cliente::create($request->all());

        return redirect()->route('cliente.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $regras = [
            'nome' => 'required',
            'cpf' => 'required|min:11|max:11',
            'sexo' => 'required',
            'email' => 'required'
        ];

        $feedbacks = [
            'nome' => 'O campo nome precisa ser preenchido',
            'cpf' =>'O campo dever ser preenchido com 11 caracteres numerais',
            'sexo' => 'O campo sexo precisa ser preenchido',
            'email' => 'o campo e-mail precisa ser preenchido',
        ];

        $request->validate($regras, $feedbacks);

        Cliente::find($id)->update($request->all());

        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cliente::find($id)->delete();

        return redirect()->route('cliente.index');
    }
}
