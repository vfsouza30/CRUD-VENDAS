@extends('layouts.default')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ $title }}</h1>
            <form id="createProductForm" action={{ route('produto.store') }} method="post">
                @csrf
                
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Digite o nome">
                    @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cor">Cor</label>
                    <input type="text" class="form-control" name="cor" id="cor" value="{{ old('cor') }}">
                    @error('cor')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco" id="preco" value="{{ old('preco') }}">
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