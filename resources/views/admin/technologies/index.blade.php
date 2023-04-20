@extends('layouts.app')


@section('title', 'Technologies')

@section('actions')
  <a href="  {{ route('admin.technologies.create') }}">
      <div class="btn btn-primary">Add new Technology</div>
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
            @forelse ($technologies as $technology)
                
            <tr>
                <th scope="row"> {{ $technology->id }} </th>
                <td>{{ $technology->label }}</td>
                <td>{{ $technology->created_at }}</td> 
                <td>{{ $technology->updated_at }}</td>
                {{-- actions --}}
                <td class="d-flex gap-3 ">
                    {{-- <a href=" {{ route('admin.technologies.show', $technology) }} "><i class="bi bi-info-circle"></i></a> --}}
                    <a href=" {{ route('admin.technologies.edit', $technology) }} "><i class="bi bi-pencil"></i></a>
                    <button technology="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $technology->id }}">
                      <i class="bi bi-trash text-danger"></i>             
                    </button>
                </td>
                
            </tr>
            @empty
                
            @endforelse
            
          </tbody>
      </table>

      {{ $technologies->links() }}
</section>


    
@endsection

@section('modal')
  @include('layouts.partials.modal_technology')
@endsection