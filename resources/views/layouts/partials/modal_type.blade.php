{{-- resources/views/pastas/index.blade.php --}}

@foreach ($types as $type)
  <!-- Modal -->
  <div class="modal fade" id="delete-modal-{{ $type->id }}" tabindex="-1" aria-labelledby="delete-modal-{{ $type->id }}-label"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="delete-modal-{{ $type->id }}-label">Conferma eliminazione</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start">
          Sei sicuro di voler eliminare il Type <strong> {{ $type->name }} </strong> con ID <strong>
          {{ $type->id }}</strong>? <br>
          L'operazione non è reversibile
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

          <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach