@extends('layouts.default')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1 class="text-center">Editar Loja</h1>
        <form id="editStoreForm" action="{{ route('loja.update', $store->id ) }}" method="post">
          @csrf
          @method('PUT')

          <label for="nome">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome" value="{{ $store->nome }}" placeholder="Digite o nome">
          @error('nome')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </br>

          <label for="cnpj">CNPJ</label>
          <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ $store->cnpj }}" placeholder="Digite o CNPJ">
          <span id="cnpj-error-edit" style="color: red; display: none;">O CNPJ deve conter 14 números.</span>
          @error('cnpj')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </br>

          <label for="CEP">CEP</label>
          <input type="text" class="form-control" name="cep" id="cep"  value="{{ $store->cep }}" placeholder="Digite o CEP">
          <span id="cep-error" style="color: red; display: none;">O CEP deve conter 8 números.</span>
          @error('cep')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          <a href="javascript:void(0)" class="btn btn-primary btn-sm mt-1" onclick="fetchAddress()">Consultar</a>
          <span class="text-danger" id="cep-error-api"></span>
          </br>

          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" name="endereco" id="endereco" value="{{ $store->endereco }}">
          @error('endereco')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </br>

          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" name="bairro" id="bairro" value="{{ $store->bairro }}">
          @error('bairro')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </br>

          <label for="endereco">Cidade</label>
          <input type="text" class="form-control" name="cidade" id="cidade" value="{{ $store->cidade }}">
          @error('cidade')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </br>

          <label for="uf">UF</label>
          <select class="form-control" name="uf" id="uf">
            <option value="D" {{ $store->uf == 'D' ? 'selected' : '' }}>Selecione uma UF</option>
            <option value="RO" {{ $store->uf == 'RO' ? 'selected' : '' }}>RO</option>
            <option value="AC" {{ $store->uf == 'AC' ? 'selected' : '' }}>AC</option>
            <option value="AL" {{ $store->uf == 'AL' ? 'selected' : '' }}>AL</option>
            <option value="AP" {{ $store->uf == 'AP' ? 'selected' : '' }}>AP</option>
            <option value="AM" {{ $store->uf == 'AM' ? 'selected' : '' }}>AM</option>
            <option value="BA" {{ $store->uf == 'BA' ? 'selected' : '' }}>BA</option>
            <option value="CE" {{ $store->uf == 'CE' ? 'selected' : '' }}>CE</option>
            <option value="DF" {{ $store->uf == 'DF' ? 'selected' : '' }}>DF</option>
            <option value="ES" {{ $store->uf == 'ES' ? 'selected' : '' }}>ES</option>
            <option value="GO" {{ $store->uf == 'GO' ? 'selected' : '' }}>GO</option>
            <option value="MA" {{ $store->uf == 'MA' ? 'selected' : '' }}>MA</option>
            <option value="MT" {{ $store->uf == 'MT' ? 'selected' : '' }}>MT</option>
            <option value="MS" {{ $store->uf == 'MS' ? 'selected' : '' }}>MS</option>
            <option value="MG" {{ $store->uf == 'MG' ? 'selected' : '' }}>MG</option>
            <option value="PA" {{ $store->uf == 'PA' ? 'selected' : '' }}>PA</option>
            <option value="PB" {{ $store->uf == 'PB' ? 'selected' : '' }}>PB</option>
            <option value="PR" {{ $store->uf == 'PR' ? 'selected' : '' }}>PR</option>
            <option value="PE" {{ $store->uf == 'PE' ? 'selected' : '' }}>PE</option>
            <option value="PI" {{ $store->uf == 'PI' ? 'selected' : '' }}>PI</option>
            <option value="RJ" {{ $store->uf == 'RJ' ? 'selected' : '' }}>RJ</option>
            <option value="RN" {{ $store->uf == 'RN' ? 'selected' : '' }}>RN</option>
            <option value="RS" {{ $store->uf == 'RS' ? 'selected' : '' }}>RS</option>
            <option value="RR" {{ $store->uf == 'RR' ? 'selected' : '' }}>RR</option>
            <option value="SC" {{ $store->uf == 'SC' ? 'selected' : '' }}>SC</option>
            <option value="SP" {{ $store->uf == 'SP' ? 'selected' : '' }}>SP</option>
            <option value="SE" {{ $store->uf == 'SE' ? 'selected' : '' }}>SE</option>
            <option value="TO" {{ $store->uf == 'TO' ? 'selected' : '' }}>TO</option>
          </select>
          @error('uf')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </br>

          <div class="modal-footer">
            <a href="{{ route('loja.index') }}" type="button" class="btn btn-secondary" >Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/validaCnpj.js') }}"></script>
<script src="{{ asset('js/validaCep.js') }}"></script>
<script>
    function fetchAddress() {
        const cep = document.getElementById('cep').value;
         document.getElementById('cep-error').innerText = '';
        axios.post('/consulta-cep', { cep: cep })
            .then(response => {
                const data = response.data;
                if(data.erro){
                    document.getElementById('cep-error-api').innerText = 'CEP não encontrado ou inválido.';
                } else {
                    document.getElementById('endereco').value = data.logradouro || '';
                    document.getElementById('bairro').value = data.bairro || '';
                    document.getElementById('cidade').value = data.localidade || '';
                }
                
            })
            .catch(error => {
                console.error(error);
                document.getElementById('cep-error-api').innerText = 'CEP não encontrado ou inválido.';
            });
    }
</script>