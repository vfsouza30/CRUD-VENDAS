<div class="modal fade" id="editClientModal{{ $row['id'] }}" tabindex="-1" role="dialog" aria-labelledby="editClientModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editClientModalLabel">Editar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editClientForm" action="{{ route('cliente.update', $row['id'] ) }}" method="post">
          @csrf
          @method('PUT')
          
          <label for="nome">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome" value="{{ $row['nome'] }}" placeholder="Digite o nome">
          @error('nome')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </br>

          <label for="cpf">CPF</label>
          <input type="text" class="form-control" name="cpf" id="cpf" value="{{ $row['cpf'] }}" placeholder="Digite o cpf">
          <span id="cpf-error" style="color: red; display: none;">O CPF deve conter 11 números.</span>
          @error('cpf')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </br>

          <label for="sexo">Sexo</label>
          <select class="form-control" name="sexo" id="sexo">
            <option value="D" {{ $row['sexo'] == 'D' ? 'selected' : '' }}>Selecione um sexo</option>
            <option value="M" {{ $row['sexo'] == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ $row['sexo'] == 'F' ? 'selected' : '' }}>Feminino</option>
          </select>
          @error('sexo')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </br>

          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="{{ $row['email'] }}" placeholder="Digite o email">
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
              $('editClientModal{{ $row['id'] }}').modal('show');
          @endif
      });
</script>
