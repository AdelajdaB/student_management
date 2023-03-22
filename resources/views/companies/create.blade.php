@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h2>Create Company Profile</h2>
                    <div class="companies-menu">
                        <div class="companies-menu">  
                            <a href="{{ route ('companies.dashboard') }}" class="btn custom-button">Go to Companies List</a>
                        </div>
                    </div>
            </div>

            <hr>

            @if ($errors->count())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $message)
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                    @endforeach
                </div>
            @endif

            <form action="{{ route ('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group mt-3">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control" name="logo">
                </div>

                <div class="form-group mt-3">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="website">
                </div>

                <button class="btn custom-button mt-3 float-end">Create Profile</button>
            </form>

        </div>
    </div>
</div>
    
@endsection