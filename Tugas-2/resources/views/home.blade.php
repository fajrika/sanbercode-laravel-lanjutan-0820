@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                        <a href="{{route('home')}}">Home</a>
                    </p>
                    <p>
                        <a href="{{route('sa')}}">Route Super Admin</a>
                    </p>
                    <p>
                        <a href="{{route('admin')}}">Route Admin</a>
                    </p>
                    <p>
                        <a href="{{route('user')}}">Route User</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
