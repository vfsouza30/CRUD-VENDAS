<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Loja;
use App\Models\Vendedor;
use App\Models\Produto;
use App\Models\VendaProduto;

class VendaController extends Controller
{
    
    public function index()
    {
        $sales = Venda::all()->makeHidden(['deleted_at']);
        
        return view('venda.index',['title' => 'Vendas', 'sales' => $sales->toArray()]);
    }

    public function create()
    {
        $clients = Cliente::select('id', 'nome')->get();
        $stores = Loja::select('id', 'nome')->get();
        $sellers = Vendedor::select('id', 'nome')->get();
        $products = Produto::select('id', 'nome', 'preco')->get();

        return view('venda.create', [
            'title' => 'Nova Venda',
            'clients' => $clients, 
            'stores' => $stores, 
            'sellers' => $sellers,
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'valor_total' => str_replace(['.', ','], ['', '.'], $request->valor_total)
        ]);

        $rules = [
            'cliente_id' => 'required|exists:clientes,id',
            'loja_id' => 'required|exists:lojas,id',
            'vendedor_id' => 'required|exists:vendedores,id',
            'produto_id' => 'required|exists:produtos,id',
            'produto_quantidade' => 'required|array',
            'produto_quantidade.*' => 'required|numeric|min:1',
            'forma_pagamento' => 'required|in:dinheiro,credito,debito',
            'valor_total' => 'required|numeric|min:1',
            'observacao' => 'nullable|string',
        ];

        $feedbacks = [
            'cliente_id' => 'O campo cliente precisa ser preenchido',
            'loja_id' => 'O campo loja precisa ser preenchido',
            'vendedor_id' => 'O campo vendedor precisa ser preenchido',
            'produto_id' => 'É necessário pelo menos 1 produto',
            'produto_quantidade' => 'É necessario pelo menos 1 quantidade do produto',
            'forma_pagamento' => 'O campo Forma de Pagamento precisa ser preenchido',
            'valor_total' => 'Valor Total inválido',
        ];

        $request->validate($rules, $feedbacks);

        $sale = new Venda();
        $sale->cliente_id = $request->cliente_id;
        $sale->loja_id = $request->loja_id;
        $sale->vendedor_id = $request->vendedor_id;
        $sale->valor_total = $request->valor_total;
        $sale->forma_pagamento = $request->forma_pagamento;
        $sale->observacao = $request->observacao;
        $sale->save();

        $saleId = $sale->id;

        foreach ($request->produto_id as $index => $productId) {
            $productSale = new VendaProduto();
            $productSale->venda_id = $saleId;
            $productSale->produto_id = $productId;
            $productSale->quantidade = $request->produto_quantidade[$index];
            $productSale->save();
        }

        return redirect()->route('venda.index')->with('success', 'Venda criada com sucesso!');
    }

    public function edit(string $id)
    {
        $sale = Venda::find($id);
        $clients = Cliente::select('id', 'nome')->get();
        $stores = Loja::select('id', 'nome')->get();
        $sellers = Vendedor::select('id', 'nome')->get();
        $products = Produto::select('id', 'nome', 'preco')->get();
        $productSales = VendaProduto::select('produto_id', 'quantidade')->where('venda_id', $id)->get();

        return view('venda.edit', [
            'title' => 'Editar Venda',
            'sale' => $sale,
            'clients' => $clients, 
            'stores' => $stores, 
            'sellers' => $sellers,
            'products' => $products,
            'productSales' => $productSales
        ]);
    }

    public function update(Request $request, Venda $venda)
    {
        $request->merge([
            'valor_total' => str_replace(['.', ','], ['', '.'], $request->valor_total)
        ]);

        $rules = [
            'cliente_id' => 'required|exists:clientes,id',
            'loja_id' => 'required|exists:lojas,id',
            'vendedor_id' => 'required|exists:vendedores,id',
            'produto_id' => 'required|exists:produtos,id',
            'produto_quantidade' => 'required|array',
            'produto_quantidade.*' => 'required|numeric|min:1',
            'forma_pagamento' => 'required|in:dinheiro,credito,debito',
            'valor_total' => 'required|numeric|min:1',
            'observacao' => 'nullable|string',
        ];

        $feedbacks = [
            'cliente_id' => 'O campo cliente precisa ser preenchido',
            'loja_id' => 'O campo loja precisa ser preenchido',
            'vendedor_id' => 'O campo vendedor precisa ser preenchido',
            'produto_id' => 'É necessário pelo menos 1 produto',
            'produto_quantidade' => 'É necessario pelo menos 1 quantidade do produto',
            'forma_pagamento' => 'O campo Forma de Pagamento precisa ser preenchido',
            'valor_total' => 'Valor Total inválido',
        ];

        $request->validate($rules, $feedbacks);

        $venda->cliente_id = $request->cliente_id;
        $venda->loja_id = $request->loja_id;
        $venda->vendedor_id = $request->vendedor_id;
        $venda->valor_total = $request->valor_total;
        $venda->forma_pagamento = $request->forma_pagamento;
        $venda->observacao = $request->observacao;
        $venda->save();

        if ($request->valor_total != $request->valor_total_original) {
            // Atualizar o valor total
            $venda->valor_total = $request->valor_total;
        }
        
        foreach ($request->produto_id as $index => $productId) {
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
