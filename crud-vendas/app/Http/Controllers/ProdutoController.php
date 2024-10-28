<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $products = Produto::all()->makeHidden(['deleted_at']);
        
        return view('produto.index',['title' => 'Produtos', 'products' => $products->toArray()]);
    }

    public function create()
    {
        return view('produto.create', ['title' => 'Novo Produto']);
    }

    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required',
            'cor' => 'required',
            'preco' => 'required|regex:/^\d{1,3}(\.\d{3})*(,\d{2})?$/',
        ];

        $feedbacks = [
            'nome' => 'O campo nome precisa ser preenchido',
            'cor' =>'O campo cor dever ser preenchido com 14 caracteres numerais',
            'preco' => 'O campo valor inválido',
        ];

        $validatedData = $request->validate($rules, $feedbacks);
        $validatedData['preco'] = str_replace(['.', ','], ['', '.'], $validatedData['preco']);

        Produto::create($validatedData);

        return redirect()->route('produto.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(string $id)
    {
        $product = Produto::find($id);
        return view('produto.edit', ['title' => 'Editar Produto', 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $rules = [
            'nome' => 'required',
            'cor' => 'required',
            'preco' => 'required|regex:/^\d{1,3}(\.\d{3})*(,\d{2})?$/',
        ];

        $feedbacks = [
            'nome' => 'O campo nome precisa ser preenchido',
            'cor' =>'O campo cor dever ser preenchido com 14 caracteres numerais',
            'preco' => 'O campo valor inválido',
        ];

        $validatedData = $request->validate($rules, $feedbacks);
        $validatedData['preco'] = str_replace(['.', ','], ['', '.'], $validatedData['preco']);

        $produto->update($validatedData);

        return redirect()->route('produto.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index')->with('success', 'Produto deletado com sucesso!');
    }

}
