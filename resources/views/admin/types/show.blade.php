@extends('layouts.app')

@section('title', $type->name)
    

@section('actions')
<div>

    <a href="  {{ route('admin.types.index') }}">
        <div class="btn btn-primary mx-1">Go back</div>
    </a>
    <a href="  {{ route('admin.types.edit', $type) }}">
        <div class="btn btn-primary mx-1">Edit</div>
    </a>
</div>
@endsection



@section('content')

<section class="d-flex">

  
    <div class="px-5">
        @if ($type->type?->label)
            
        <p>
            <strong>Type</strong>
            <span class="badge rounded-pill text-bg-primary">
                {{ $type->type->label }}</span>
        </p>
        @endif
        <h3 class="pb-3 text-dark"> Used technologies: <br> <i class="text-muted">
            {{ $type->technology }}  </i></h3>
            <hr>
        <p> {{ $type->description }} </p>
        <hr>
        <h4> <a href=" {{ $type->url }} ">{{ $type->url }} </a>  </h4>
    </div>

</section>
    
@endsection