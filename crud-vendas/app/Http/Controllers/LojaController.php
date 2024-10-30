<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loja;
use App\Http\Requests\StoreLojaRequest;

class LojaController extends Controller
{
   
    public function index()
    {
        $stores = Loja::all()->makeHidden(['deleted_at']);
        
        return view('pages.loja.index',['title' => 'Lojas', 'stores' => $stores->toArray()]);
    }

    public function create()
    {
        return view('pages.loja.create', ['title' => 'Nova Loja']);
    }

    public function store(StoreLojaRequest $request)
    {
        
        $validatedData = $request->validated();

        Loja::create($validatedData);

        return redirect()->route('loja.index')->with('success', 'Loja criada com sucesso!');
    }

    public function edit(string $id)
    {
        $store = Loja::find($id);
        
        return view('pages.loja.edit', ['title' => 'Editar Loja', 'store' => $store]);
    }

    public function update(StoreLojaRequest $request, Loja $loja)
    {
       
        $validatedData = $request->validated();

        $loja->update($validatedData);

        return redirect()->route('loja.index')->with('success', 'Loja atualizada com sucesso!');
    }

    public function destroy(Loja $loja)
    {
        $loja->delete();

        return redirect()->route('loja.index')->with('success', 'Loja deletada com sucesso!');
    }

}
