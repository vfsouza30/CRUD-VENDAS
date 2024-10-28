<div class="modal fade" id="deleteModal{{ $row['id'] }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $row['id'] }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="deleteForm{{ $row['id'] }}" action="{{ route($routeDestroy, $row['id']) }}" method="post">
          @csrf
          @method('DELETE')
          <p> Deseja excluir {{ $row['nome'] }} ?
          </br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-danger">Excluir</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
