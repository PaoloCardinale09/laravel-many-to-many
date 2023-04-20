@extends('layouts.app')


@section('actions')

<a href="  {{ route('admin.projects.index') }}">
    <div class="btn btn-primary">Go to Project</div>
</a>
    
@endsection

@section('content')


<div class="content">
    <div class="container">
      <img class="img-fluid" src="https://www.nicepng.com/png/full/111-1112693_portfolio-my-portfolio.png"  alt="">
    </div>
</div>
@endsection