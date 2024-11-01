<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Loja;
use App\Models\Vendedor;
use App\Models\Produto;
use App\Models\VendaProduto;

use App\Http\Requests\StoreVendaRequest;
use App\Repositories\VendaRepository;

class VendaController extends Controller
{
    protected $vendaRepository;

    public function __construct()
    {
        $this->vendaRepository = new VendaRepository();
    }
    
    public function index()
    {
        $sales = $this->vendaRepository->getAllSales();
        
        return view('pages.venda.index',['title' => 'Vendas', 'sales' => $sales]);
    }

    public function create()
    {
        $clients = Cliente::select('id', 'nome')->get();
        $stores = Loja::select('id', 'nome')->get();
        $sellers = Vendedor::select('id', 'nome')->get();
        $products = Produto::select('id', 'nome', 'preco')->get();

        return view('pages.venda.create', [
            'title' => 'Nova Venda',
            'clients' => $clients, 
            'stores' => $stores, 
            'sellers' => $sellers,
            'products' => $products
        ]);
    }

    public function store(StoreVendaRequest $request)
    {

        $validatedData = $request->validated();

        $sale = new Venda();
        $sale->cliente_id = $validatedData['cliente_id'];
        $sale->loja_id = $validatedData['loja_id'];
        $sale->vendedor_id = $validatedData['vendedor_id'];
        $sale->valor_total = $validatedData['valor_total'];
        $sale->forma_pagamento = $validatedData['forma_pagamento'];
        $sale->observacao = $validatedData['observacao'];
        $sale->save();

        foreach ($validatedData['produto_id'] as $index => $produtoId) {

            VendaProduto::create([
                'venda_id' => $sale->id,
                'produto_id' => $produtoId,
                'quantidade' => $validatedData['produto_quantidade'][$index],
            ]);
        }

        return redirect()->route('venda.index')->with('success', 'Venda criada com sucesso!');
    }

    public function edit(string $id)
    {
        $sale = Venda::find($id);
        $clients = Cliente::select('id', 'nome')->get();
        $stores = Loja::select('id', 'nome')->get();
        $sellers = Vendedor::select('id', 'nome')->where('loja_id', $sale->loja_id)->get();
        $products = Produto::select('id', 'nome', 'preco')->get();
        $productSales = VendaProduto::select('produto_id', 'quantidade')->where('venda_id', $id)->get();

        return view('pages.venda.edit', [
            'title' => 'Editar Venda',
            'sale' => $sale,
            'clients' => $clients, 
            'stores' => $stores, 
            'sellers' => $sellers,
            'products' => $products,
            'productSales' => $productSales
        ]);
    }

    public function update(StoreVendaRequest $request, Venda $venda)
    {

        $validatedData = $request->validated();

        $venda->cliente_id = $validatedData['cliente_id'];
        $venda->loja_id = $validatedData['loja_id'];
        $venda->vendedor_id = $validatedData['vendedor_id'];
        $venda->valor_total = $validatedData['valor_total'];
        $venda->forma_pagamento = $validatedData['forma_pagamento'];
        $venda->observacao = $validatedData['observacao'];
        $venda->save();
        
        foreach ($validatedData['produto_id'] as $index => $productId) {
            
            $productSale = VendaProduto::where('venda_id', $venda->id)->where('produto_id', $productId)->first();

            if(!$productSale){
                $productSale = new VendaProduto();
                $productSale->venda_id = $venda->id;
            }

            $productSale->produto_id = $productId;
            $productSale->quantidade = $request->produto_quantidade[$index];
            $productSale->save();
        }

        return redirect()->route('venda.index')->with('success', 'Venda editada com sucesso!');
    }

    public function destroy(Venda $venda)
    {
        VendaProduto::where('venda_id', $venda->id)->delete();
        $venda->delete();

        return redirect()->route('venda.index')->with('success', 'Venda excluída com sucesso!');
    }
}
