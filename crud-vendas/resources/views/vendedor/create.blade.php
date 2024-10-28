@extends('layouts.default')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ $title }}</h1>
            <form id="createSellerForm" action={{ route('vendedor.store') }} method="post">
                @csrf
                
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Digite o nome">
                    @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" value="{{ old('cpf') }}" placeholder="Digite o cpf">
                    <span id="cpf-error" style="color: red; display: none;">O CPF deve conter 11 números.</span>
                    @error('cpf')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="loja">Loja</label>
                    <select class="form-control" name="loja_id" id="loja_id">
                        <option value="D" {{ old('loja_id') == 'D' ? 'selected' : '' }}>Selecione uma loja</option>
                        @foreach ( $stores as $store)
                            <option value="{{ $store->id }}" {{ old('loja_id') == $store->id ? 'selected' : '' }}>{{ $store->nome }}</option>
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

<script src="{{ asset('js/validaCpf.js') }}"></script>