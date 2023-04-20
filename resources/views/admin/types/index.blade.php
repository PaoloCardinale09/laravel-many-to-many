@extends('layouts.app')


@section('title', 'Types')

@section('actions')
  <a href="  {{ route('admin.types.create') }}">
      <div class="btn btn-primary">Add new Type</div>
  </a>
@endsection
    

@section('content')

<section class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Label</th>
              <th scope="col">Created at</th>
              <th scope="col">Updated at</th>
              <th scope="col">Actions</th>
         
            </tr>
          </thead>
          <tbody>
            @forelse ($types as $type)
                
            <tr>
                <th scope="row"> {{ $type->id }} </th>
                <td>{{ $type->label }}</td>
                <td>{{ $type->created_at }}</td> 
                <td>{{ $type->updated_at }}</td>
                {{-- actions --}}
                <td class="d-flex gap-3 ">
                    {{-- <a href=" {{ route('admin.types.show', $type) }} "><i class="bi bi-info-circle"></i></a> --}}
                    <a href=" {{ route('admin.types.edit', $type) }} "><i class="bi bi-pencil"></i></a>
                    <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $type->id }}">
                      <i class="bi bi-trash text-danger"></i>             
                    </button>
                </td>
                
            </tr>
            @empty
                
            @endforelse
            
          </tbody>
      </table>

      {{ $types->links() }}
</section>


    
@endsection

@section('modal')
  @include('layouts.partials.modal_type')
@endsection