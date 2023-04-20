@extends('layouts.app')

@section('title', $type->id ? 'Edit Type' : 'Add new Type')
    
@section('actions')
<a href="  {{ route('admin.types.index') }}">
    <div class="btn btn-primary">Go back to the list</div>
</a>
@endsection

@section('content')

  @include('layouts.partials.errors')

    <section class="card">
        <div class="card-body py-4">

          @if ($type->id)
            <form action=" {{ route('admin.types.update', $type)}} " method="POST" class="row" enctype="multipart/form-data">
              @method('PUT')
              
          @else
            <form action=" {{ route('admin.types.store')}} " method="POST" class="row" enctype="multipart/form-data">
          @endif

            @csrf

            <div class="row">
              <div class="col-2 mb-4">
                <label class="form-label" for="name">Label</label>
              </div>
              <div class="col-10">
                <input class="form-control @error('label')is-invalid @enderror" type="text" name="label" id="label" value=" {{ old('label', $type->label) }} "/>
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