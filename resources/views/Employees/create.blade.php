@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h2>Create Employee Profile</h2>

                <div class="companies-menu">  
                    <a href="{{ route ('employees.dashboard') }}" class="btn custom-button employees-button">Go to Employees List</a>
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

            <form action="{{ route ('employees.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" name="firstname">
                </div>

                <div class="form-group mt-3">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname">
                </div>

                <div class="form-group mt-3">
                    <label for="company">Company</label>
                    <select class="form-control" name="company_id">
                        <option selected>Select Company</option>
                        @if ($comps->count())
                        @foreach ($comps as $comp)
                            <option value="{{$comp->id}}">{{$comp->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group mt-3">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" name="phone">
                </div>

                <button class="btn custom-button employees-button mt-3 float-end">Create Profile</button>
            </form>

        </div>
    </div>
</div>
    
@endsection