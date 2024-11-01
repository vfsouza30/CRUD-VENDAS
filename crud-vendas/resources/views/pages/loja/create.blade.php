@extends('layouts.default')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ $title }}</h1>
            <form id="createStoreForm" action={{ route('loja.store') }} method="post">
                @csrf
                
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Digite o nome">
                    @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ old('cnpj') }}" placeholder="Digite o CNPJ">
                    <span id="cnpj-error" style="color: red; display: none;"></span>
                    @error('cnpj')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" value="{{ old('cep') }}" placeholder="Digite o CEP">
                    <span class="text-danger" id="cep-error"></span>
                    @error('cep')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm mt-1" onclick="fetchAddress()">Consultar</a>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" value="{{ old('endereco') }}">
                    @error('endereco')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" value="{{ old('bairro') }}">
                    @error('bairro')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" value="{{ old('cidade') }}">
                    @error('cidade')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="uf">UF</label>
                    <select class="form-control" name="uf" id="uf">
                        <option value="D" {{ old('uf') == 'D' ? 'selected' : '' }}>Selecione uma UF</option>
                        <option value="RO" {{ old('uf') == 'RO' ? 'selected' : '' }}>RO</option>
                        <option value="AC" {{ old('uf') == 'AC' ? 'selected' : '' }}>AC</option>
                        <option value="AL" {{ old('uf') == 'AL' ? 'selected' : '' }}>AL</option>
                        <option value="AP" {{ old('uf') == 'AP' ? 'selected' : '' }}>AP</option>
                        <option value="AM" {{ old('uf') == 'AM' ? 'selected' : '' }}>AM</option>
                        <option value="BA" {{ old('uf') == 'BA' ? 'selected' : '' }}>BA</option>
                        <option value="CE" {{ old('uf') == 'CE' ? 'selected' : '' }}>CE</option>
                        <option value="DF" {{ old('uf') == 'DF' ? 'selected' : '' }}>DF</option>
                        <option value="ES" {{ old('uf') == 'ES' ? 'selected' : '' }}>ES</option>
                        <option value="GO" {{ old('uf') == 'GO' ? 'selected' : '' }}>GO</option>
                        <option value="MA" {{ old('uf') == 'MA' ? 'selected' : '' }}>MA</option>
                        <option value="MT" {{ old('uf') == 'MT' ? 'selected' : '' }}>MT</option>
                        <option value="MS" {{ old('uf') == 'MS' ? 'selected' : '' }}>MS</option>
                        <option value="MG" {{ old('uf') == 'MG' ? 'selected' : '' }}>MG</option>
                        <option value="PA" {{ old('uf') == 'PA' ? 'selected' : '' }}>PA</option>
                        <option value="PB" {{ old('uf') == 'PB' ? 'selected' : '' }}>PB</option>
                        <option value="PR" {{ old('uf') == 'PR' ? 'selected' : '' }}>PR</option>
                        <option value="PE" {{ old('uf') == 'PE' ? 'selected' : '' }}>PE</option>
                        <option value="PI" {{ old('uf') == 'PI' ? 'selected' : '' }}>PI</option>
                        <option value="RJ" {{ old('uf') == 'RJ' ? 'selected' : '' }}>RJ</option>
                        <option value="RN" {{ old('uf') == 'RN' ? 'selected' : '' }}>RN</option>
                        <option value="RS" {{ old('uf') == 'RS' ? 'selected' : '' }}>RS</option>
                        <option value="RR" {{ old('uf') == 'RR' ? 'selected' : '' }}>RR</option>
                        <option value="SC" {{ old('uf') == 'SC' ? 'selected' : '' }}>SC</option>
                        <option value="SP" {{ old('uf') == 'SP' ? 'selected' : '' }}>SP</option>
                        <option value="SE" {{ old('uf') == 'SE' ? 'selected' : '' }}>SE</option>
                        <option value="TO" {{ old('uf') == 'TO' ? 'selected' : '' }}>TO</option>
                    </select>
                    @error('uf')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="modal-footer">
                    <a href="{{ route('loja.index') }}" type="button" class="btn btn-secondary" >Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite(['resources/js/app.js'])
