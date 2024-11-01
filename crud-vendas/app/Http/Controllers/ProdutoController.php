<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Requests\StoreProdutoRequest;

class ProdutoController extends Controller
{
    public function index()
    {
        $products = Produto::all()->makeHidden(['deleted_at']);
        
        return view('pages.produto.index',['title' => 'Produtos', 'products' => $products->toArray()]);
    }

    public function create()
    {
        return view('pages.produto.create', ['title' => 'Novo Produto']);
    }

    public function store(StoreProdutoRequest $request)
    {

        $validatedData = $request->validated();
        $validatedData['preco'] = str_replace(['.', ','], ['', '.'], $validatedData['preco']);

        Produto::create($validatedData);

        return redirect()->route('produto.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(string $id)
    {
        $product = Produto::find($id);

        return view('pages.produto.edit', ['title' => 'Editar Produto', 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProdutoRequest $request, Produto $produto)
    {

        $validatedData = $request->validated();
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
