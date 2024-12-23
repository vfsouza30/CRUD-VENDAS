@extends('layouts.default')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ $title }}</h1>
            <form id="createSaleForm" action={{ route('venda.store') }} method="post">
                @csrf
                
                <div class="form-group">
                    <label for="cliente">Cliente</label>
                    <select class="form-control" name="cliente_id" id="cliente_id">
                        <option value="D" {{ old('cliente_id') == 'D' ? 'selected' : '' }}>Selecione uma cliente</option>
                        @foreach ( $clients as $client)
                            <option value="{{ $client->id }}" {{ old('cliente_id') == $client->id ? 'selected' : '' }}>{{ $client->nome }}</option>
                        @endforeach
                    </select>
                    @error('cliente_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="loja">Loja</label>
                    <select class="form-control" name="loja_id" id="loja_id" onchange="fetchSeller()">
                        <option value="D" {{ old('loja_id') == 'D' ? 'selected' : '' }}>Selecione uma loja</option>
                        @foreach ( $stores as $store)
                            <option value="{{ $store->id }}" {{ old('loja_id') == $store->id ? 'selected' : '' }}>{{ $store->nome }}</option>
                        @endforeach
                    </select>
                    @error('loja_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="vendedor">Vendedor</label>
                    <select class="form-control" name="vendedor_id" id="vendedor_id">
                        <option value="D">Selecione um vendedor</option>
                    </select>
                    @error('vendedor_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                @foreach ($products as $product)
                    <div>
                        <input type="checkbox" name="produto_id[]" id="produto_id_{{ $product->id }}" value="{{ $product->id }}" />
                        <label for="produto_id_{{ $product->id }}">{{ $product->nome }}</label>
                        @error('produto_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="d-flex align-items-center">                        
                            <input type="number" class="form-control mr-2" name="produto_quantidade[]" id="produto_quantidade_{{ $product->id }}" value="{{ old('produto_quantidade.' . $loop->index, 1) }}" min="1" data-id="{{ $product->id }}">
                            <input type="text" class="form-control" name="produto_preco[]" id="produto_preco_{{ $product->id }}" value="{{ number_format($product->preco, 2, ',', '.') }}" readonly="true" data-id="{{ $product->id }}">
                        </div>
                    </div>
                @endforeach

                <div class="form-group">
                    <label for="observacao">Observação</label>
                    <textarea class="form-control" name="observacao" id="observacao">
                            {{ old('observacao') }}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="forma_pagamento">Forma de Pagamento</label>
                    <select class="form-control" name="forma_pagamento" id="forma_pagamento">
                        <option value="D" {{ old('forma_pagamento') == 'D' ? 'selected' : '' }}>Selecione uma forma de pagamento</option>
                        <option value="dinheiro" {{ old('forma_pagamento') == 'dinheiro' ? 'selected' : '' }}>Dinheiro</option>
                        <option value="credito" {{ old('forma_pagamento') == 'credito' ? 'selected' : '' }}>Crédito</option>
                        <option value="debito" {{ old('forma_pagamento') == 'debito' ? 'selected' : '' }}>Débito</option>
                    </select>
                    @error('forma_pagamento')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="valor_total">Valor Total</label>
                    <input type="text" class="form-control" name="valor_total" id="valor_total" value="{{ old('valor_total') }}" readonly="true">
                    @error('valor_total')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="modal-footer">
                    <a href="{{ route('venda.index') }}" type="button" class="btn btn-secondary" >Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite(['resources/js/app.js', 'resources/js/vendaNova.js'])