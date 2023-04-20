@extends('layouts.app')

@section('title', $project->name)
    

@section('actions')
<div>

    <a href="  {{ route('admin.projects.index') }}">
        <div class="btn btn-primary mx-1">Go back</div>
    </a>
    <a href="  {{ route('admin.projects.edit', $project) }}">
        <div class="btn btn-primary mx-1">Edit</div>
    </a>
</div>
@endsection



@section('content')

<section class="d-flex">

    <div>
        <img src=" {{ $project->getImageUri() }}  " alt="" class="img-fluid">
    </div>
    <div class="px-5">
        @if ($project->type?->label)
            
        <p>
            <strong>Type</strong>
            <span class="badge rounded-pill text-bg-primary">
                {{ $project->type->label }}</span>
        </p>
        @endif
        <h3 class="pb-3 text-dark"> Used technologies: <br> <i class="text-muted">
            {{ $project->technology }}  </i></h3>
            <hr>
        <p> {{ $project->description }} </p>
        <hr>
        <h4> <a href=" {{ $project->url }} ">{{ $project->url }} </a>  </h4>
    </div>

</section>
    
@endsection