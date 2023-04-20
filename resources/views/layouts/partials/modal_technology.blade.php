

@foreach ($technologies as $technology)
  <!-- Modal -->
  <div class="modal fade" id="delete-modal-{{ $technology->id }}" tabindex="-1" aria-labelledby="delete-modal-{{ $technology->id }}-label"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="delete-modal-{{ $technology->id }}-label">Conferma eliminazione</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start">
          Sei sicuro di voler eliminare la Technology <strong> {{ $technology->label }} </strong> con ID <strong>
          {{ $technology->id }}</strong>? <br>
          L'operazione non è reversibile
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

          <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" class="">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach