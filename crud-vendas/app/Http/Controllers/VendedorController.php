<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use App\Models\Loja;
use App\Http\Requests\StoreVendedorRequest;
use App\Http\Requests\UpdateVendedorRequest;
use App\Repositories\VendedorRepository;

class VendedorController extends Controller
{
    protected $vendedorRepository;

    public function __construct()
    {
        $this->vendedorRepository = new VendedorRepository();
    }
    public function index()
    {
        $sellers = $this->vendedorRepository->getAllSellers();
        return view('pages.vendedor.index', ['title' => 'Vendedores', 'sellers' => $sellers]);
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

    public function update(UpdateVendedorRequest $request, Vendedor $vendedor)
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
