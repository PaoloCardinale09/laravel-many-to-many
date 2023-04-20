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

<section class="row">
    
    <div class="col-4">
        <img src=" {{ $project->getImageUri() }}  " alt="" class="img-fluid">
    </div>
    <div class="px-5 col-8">
        @if ($project->type?->label)
            
        <p>
            <strong>Type</strong>
            <span class="badge rounded-pill text-bg-primary">
                {{ $project->type->label }}</span>
        </p>
        @endif
        <h3 class="pb-3 text-dark"> Used technologies: <br> <i class="text-muted">
            @forelse ($project->technologies as $technology) {{ $technology->label }} @unless ($loop->last)
                    ,
                @endunless 
               
                @empty -
                @endforelse </i></h3>
            <hr>
        <p> {{ $project->description }} </p>
        <hr>
        <h4> <a href=" {{ $project->url }} ">{{ $project->url }} </a>  </h4>
    </div>
    <div class="col ps-5 mt-5">
        <p> <strong> Created at:</strong> {{ $project->created_at }} </p>
    </div>
     <div class="col text-end pe-5 mt-5">
        <p> <strong> Updated at:</strong> {{ $project->updated_at }} </p>
    </div>
    

</section>
    
@endsection