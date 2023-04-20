@extends('layouts.app')


@section('title', 'Projects')

@section('actions')
<a href="  {{ route('admin.projects.create') }}">
    <div class="btn btn-primary">Add new Project</div>
</a>
@endsection
    

@section('content')

<section class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Tecnology</th>
              <th scope="col">Actions</th>
         
            </tr>
          </thead>
          <tbody>
            @forelse ($projects as $project)
                
            <tr>
                <th scope="row"> {{ $project->id }} </th>
                <td>{{ $project->name }}</td>
                <td>{{ $project->technology }}</td>
                <td>
                    <a href=" {{ route('admin.projects.show', $project) }} "><i class="bi bi-eye"></i></a>
                    <a href=" {{ route('admin.projects.show', $project) }} "><i class="bi bi-pencil"></i></a>
                    <a href=" {{ route('admin.projects.show', $project) }} "><i class="bi bi-trash"></i></a>
                </td>
                
            </tr>
            @empty
                
            @endforelse
            
          </tbody>
      </table>

      {{ $projects->links() }}
</section>
    
@endsection