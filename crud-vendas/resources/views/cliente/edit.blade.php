@extends('layouts.default')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ $title }}</h1>
            <form id="editClientForm" action="{{ route('cliente.update', $client->id ) }}" method="post">
                @csrf
                @method('PUT')
                
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $client->nome }}" placeholder="Digite o nome">
                @error('nome')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>

                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" value="{{ $client->cpf }}" placeholder="Digite o cpf">
                <span id="cpf-error-edit" style="color: red; display: none;">O CPF deve conter 11 números.</span>
                @error('cpf')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>

                <label for="sexo">Sexo</label>
                <select class="form-control" name="sexo" id="sexo">
                    <option value="D" {{ $client->sexo == 'D' ? 'selected' : '' }}>Selecione um sexo</option>
                    <option value="M" {{ $client->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ $client->sexo == 'F' ? 'selected' : '' }}>Feminino</option>
                </select>
                @error('sexo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>

                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $client->email }}" placeholder="Digite o email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div class="modal-footer">
                    <a href="{{ route('cliente.index') }}" type="button" class="btn btn-secondary" >Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>         
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/validaCpf.js') }}"></script>