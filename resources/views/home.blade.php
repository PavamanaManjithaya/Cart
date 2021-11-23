@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">{{ __('Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    <p class="card-text">welcome admin....</p>
                    <span class="badge badge-success p-3">A good restaurant is like a vacation; it transports you, and it becomes a lot more than just about the food</span>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
