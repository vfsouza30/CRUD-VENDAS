@extends('layouts.default')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ $title }}</h1>
            <form id="createClientForm" action={{ route('cliente.store') }} method="post">
                @csrf
                
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Digite o nome">
                @error('nome')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>

                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" value="{{ old('cpf') }}" placeholder="Digite o cpf">
                <span id="cpf-error" style="color: red; display: none;">O CPF deve conter 11 números.</span>
                @error('cpf')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>

                <label for="sexo">Sexo</label>
                <select class="form-control" name="sexo" id="sexo">
                    <option value="D" {{ old('sexo') == 'D' ? 'selected' : '' }}>Selecione um sexo</option>
                    <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Feminino</option>
                </select>
                @error('sexo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>

                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Digite o email">
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