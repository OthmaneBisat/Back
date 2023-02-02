@extends('layouts.app')

@section('content')
<link href="\assets\bootstrap.css" rel="stylesheet">
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

                    {{ __('You are logged in!') }}
                    <script>
                        setTimeout(function() {
                          window.location.href = "{{ url('/bisat') }}";
                        }, 500);
                      </script>
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
