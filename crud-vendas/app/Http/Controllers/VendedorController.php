<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use App\Models\Loja;

class VendedorController extends Controller
{

    public function index()
    {
        $sellers = Vendedor::all()->makeHidden(['deleted_at']);
        return view('vendedor.index', ['title' => 'Vendedores', 'sellers' => $sellers->toArray()]);
    }

    public function create()
    {
        $stores = Loja::select('id', 'nome')->get();
        return view('vendedor.create', ['title' => 'Novo Vendedor', 'stores' => $stores]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required',
            'cpf' => 'required|digits:11',
            'loja_id' => 'required|exists:lojas,id',
        ];

        $feedbacks = [
            'nome' => 'O campo nome precisa ser preenchido',
            'cpf' =>'O campo CPF dever ser preenchido com 11 caracteres numerais',
            'loja_id.required' => 'O campo loja precisa ser preenchido',
            'loja_id.exists' => 'A loja selecionada não é válida',
        ];

        $validatedData = $request->validate($rules, $feedbacks);

        Vendedor::create($validatedData);

        return redirect()->route('vendedor.index')->with('success', 'Vendedor criado com sucesso!');
    }
    public function edit(string $id)
    {
        $seller = Vendedor::find($id);
        $stores = Loja::select('id', 'nome')->get();
        return view('vendedor.edit', ['title' => 'Editar Vendedor', 'seller' => $seller, 'stores' => $stores]);
    }

    public function update(Request $request, Vendedor $vendedor)
    {
        $rules = [
            'nome' => 'required',
            'cpf' => 'required|digits:11',
            'loja_id' => 'required|exists:lojas,id',
        ];

        $feedbacks = [
            'nome' => 'O campo nome precisa ser preenchido',
            'cpf' =>'O campo CPF dever ser preenchido com 11 caracteres numerais',
            'loja_id.required' => 'O campo loja precisa ser preenchido',
            'loja_id.exists' => 'A loja selecionada não é válida',
        ];

        $validatedData = $request->validate($rules, $feedbacks);

        $vendedor->update($validatedData);

        return redirect()->route('vendedor.index')->with('success', 'Vendedor atualizado com sucesso!');
    }

    public function destroy(Vendedor $vendedor)
    {
        $vendedor->delete();
        return redirect()->route('vendedor.index')->with('success', 'Vendedor excluído com sucesso!');
    }
}
