{{-- @extends('layouts.app')

@section('title', 'Create new Project')
    
@section('actions')
<a href="  {{ route('admin.projects.index') }}">
    <div class="btn btn-primary">Go back to the list</div>
</a>
@endsection

@section('content')

  @include('layouts.partials.errors')

    <section class="card">
        <div class="card-body">
          <form action=" {{ route('admin.projects.store')}} " method="POST" class="row">
            @csrf
            <div class="col-6 mb-3">
              <label class="form-label" for="name">Name</label>
              <input class="form-control @error('name')is-invalid @enderror" type="text" name="name" id="name" value=" {{ old('name') }} "/>
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-6 mb-3">
              <label class="form-label" for="technology">Technology</label>
              <input class="form-control @error('technology')is-invalid @enderror" type="text" name="technology" id="technology" value=" {{ old('technology') }} " />
              @error('technology')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            
            <div class="col-6 mb-3">
              <label class="form-label" for="url">Url</label>
              <input class="form-control @error('url')is-invalid @enderror" type="text" name="url" id="url" value=" {{ old('url')}} "/>
              @error('url')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="col-6 mb-3">
              <label class="form-label" for="image">Image</label>
              <input class="form-control @error('image')is-invalid @enderror" type="text" name="image" id="image" value="https://picsum.photos/400/300"/>
              @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="col-12 mb-3"> 
              <label class="form-label" for="description">Description</label>
              <textarea class="form-control @error('description')is-invalid @enderror" type="text" name="description" id="description"> {{ old('description') }}</textarea>
              @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col mb-3 ">
              <input class="btn btn-primary" type="submit" value="Save"/>
            </div>
            
          </form>
            
        </div>

    </section>
    
@endsection --}}