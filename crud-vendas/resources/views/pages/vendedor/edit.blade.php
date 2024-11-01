@extends('layouts.default')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ $title }}</h1>
            <form id="editSellerForm" action={{ route('vendedor.update', $seller->id) }} method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $seller->nome }}" placeholder="Digite o nome">
                    @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" value="{{ $seller->cpf }}" placeholder="Digite o cpf">
                    <span id="cpf-error" style="color: red; display: none;"></span>
                    @error('cpf')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="loja">Loja</label>
                    <select class="form-control" name="loja_id" id="loja_id">
                        <option value="D" {{ old('loja_id') == 'D' ? 'selected' : '' }}>Selecione uma loja</option>
                        @foreach ( $stores as $store)
                            <option value="{{ $store->id }}" {{ $store->id == $seller->id ? 'selected' : '' }}>{{ $store->nome }}</option>
                        @endforeach
                    </select>
                    @error('loja_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="modal-footer">
                    <a href="{{ route('vendedor.index') }}" type="button" class="btn btn-secondary" >Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite(['resources/js/app.js'])