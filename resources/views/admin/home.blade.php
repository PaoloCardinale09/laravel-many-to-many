@extends('layouts.app')

@section('actions')
<a href="  {{ route('admin.projects.index') }}">
    <div class="btn btn-primary">Go to Projects</div>
</a>
@endsection

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!!') }}
                </div>
                <a href="  {{ route('admin.projects.index') }}">
                 <img class="img-fluid" src="https://www.nicepng.com/png/full/111-1112693_portfolio-my-portfolio.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
