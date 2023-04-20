@extends('layouts.app')

@section('title', $technology->id ? 'Edit Technology' : 'Add new Technology')
    
@section('actions')
<a href="  {{ route('admin.technologies.index') }}">
    <div class="btn btn-primary">Go back to the list</div>
</a>
@endsection

@section('content')

  @include('layouts.partials.errors')

    <section class="card">
        <div class="card-body py-4">

          @if ($technology->id)
            <form action=" {{ route('admin.technologies.update', $technology)}} " method="POST" class="row" enctype="multipart/form-data">
              @method('PUT')
              
          @else
            <form action=" {{ route('admin.technologies.store')}} " method="POST" class="row" enctype="multipart/form-data">
          @endif

            @csrf

            <div class="row">
              <div class="col-2 mb-4">
                <label class="form-label" for="name">Label</label>
              </div>
              <div class="col-10">
                <input class="form-control @error('label')is-invalid @enderror" type="text" name="label" id="label" value=" {{ old('label', $technology->label) }} "/>
                @error('label')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>




            <div class="col my-3 ">
              <input class="btn btn-primary" type="submit" value="Save"/>
            </div>
            
          </form>
            
        </div>

    </section>
    
@endsection