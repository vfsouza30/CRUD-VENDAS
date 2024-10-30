<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use App\Models\Loja;
use App\Http\Requests\StoreVendedorRequest;

class VendedorController extends Controller
{

    public function index()
    {
        $sellers = Vendedor::all()->makeHidden(['deleted_at']);

        return view('pages.vendedor.index', ['title' => 'Vendedores', 'sellers' => $sellers->toArray()]);
    }

    public function create()
    {
        $stores = Loja::select('id', 'nome')->get();
        return view('pages.vendedor.create', ['title' => 'Novo Vendedor', 'stores' => $stores]);
    }

    public function store(StoreVendedorRequest $request)
    {

        $validatedData = $request->validated();

        Vendedor::create($validatedData);

        return redirect()->route('vendedor.index')->with('success', 'Vendedor criado com sucesso!');
    }
    public function edit(string $id)
    {
        $seller = Vendedor::find($id);
        $stores = Loja::select('id', 'nome')->get();

        return view('pages.vendedor.edit', ['title' => 'Editar Vendedor', 'seller' => $seller, 'stores' => $stores]);
    }

    public function update(StoreVendedorRequest $request, Vendedor $vendedor)
    {

        $validatedData = $request->validated();

        $vendedor->update($validatedData);

        return redirect()->route('vendedor.index')->with('success', 'Vendedor atualizado com sucesso!');
    }

    public function destroy(Vendedor $vendedor)
    {
        $vendedor->delete();
        
        return redirect()->route('vendedor.index')->with('success', 'Vendedor excluído com sucesso!');
    }
}
