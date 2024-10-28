<div class="modal fade" id="createClientModal" tabindex="-1" role="dialog" aria-labelledby="createClientModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createClientModalLabel">Criar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/validaCpf.js"></script>

<script>

  document.addEventListener("DOMContentLoaded", function() {
          @if($errors->any())
              $('#createClientModal').modal('show');
          @endif
      });

    $('#createClientModal').on('shown.bs.modal', function () {
        const cpfInput1 = document.getElementById('cpf');
        const nomeInput1 = document.getElementById('nome');
        const sexoselect1 = document.getElementById('sexo');
        const emailInput1 = document.getElementById('email');
        const cpfError1 = document.getElementById('cpf-error');

        cpfInput1.value = '';
        nomeInput1.value = '';
        sexoselect1.value = 'D';
        emailInput1.value = '';
        cpfError1.style.display = 'none';
    });
</script>