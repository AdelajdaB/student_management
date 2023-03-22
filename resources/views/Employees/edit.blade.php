@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route ('employees.dashboard') }}" class="btn custom-button employees-button back">Go to Dashboard</a>
        <div class="d-flex">
            <h2 class="m-3 ms-0">Edit {{ $employee->name }} Profile</h2>

            <div class="ms-auto delete-profile">
                <a class="btn btn-outline-danger btn-block me-3" href="#" onclick="deleteEmployeeProfile()">Delete Profile</a>
                <form action="{{ route('employees.delete', $employee->id) }}" id="delete-employee-profile-form" style="display:none" method="POST">
                  @csrf
                  @method('DELETE')
              </form>
            </div>
        </div>

        {{-- Success Creation Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif        

    {{-- Update Data --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="card m-3 ms-0">
                <div class="card-body">
                    <h5>Modify Profile Data</h5>
                    <hr>
        
                    {{-- Check for errors --}}
                    @if ($errors->count())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $message)
                            <ul>
                                <li>{{ $message }}</li>
                            </ul>
                            @endforeach
                        </div>
                    @endif
                    
                    {{-- Form Data --}}
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
        
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="{{ $employee->firstname }}">
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="{{ $employee->lastname }}">
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" name="company" value="{{ $employee->company }}">
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $employee->email }}">
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" name="phone" value="{{ $employee->phone }}">
                        </div>

                        <button class="btn custom-button employees-button mt-3 float-end">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer-scripts')
    <script>
        function deleteEmployeeProfile() {
            var r = confirm("Are you sure you want to delete this profile?")
            if (r) {
                document.querySelector('form#delete-employee-profile-form').submit()
            }
        }
    </script>
@endpush