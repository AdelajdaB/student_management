@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center dashboard">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> --}}

        <div class="col-md-5 box companies-box me-3">
            <div class="box-container">
                <div class="inner-box inner-box-company">
                    <a href="{{ route('students.dashboard') }}">Manage Students</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
