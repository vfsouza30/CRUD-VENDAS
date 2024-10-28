@extends('layouts.default')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ $title }}</h1>
            <form id="editProductForm" action={{ route('produto.update', $product->id) }} method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $product->nome }}" placeholder="Digite o nome">
                    @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cor">Cor</label>
                    <input type="text" class="form-control" name="cor" id="cor" value="{{ $product->cor }}">
                    @error('cor')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco" id="preco" value="{{ number_format($product->preco, 2, ',', '.') }}">
                    @error('preco')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="modal-footer">
                    <a href="{{ route('produto.index') }}" type="button" class="btn btn-secondary" >Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>