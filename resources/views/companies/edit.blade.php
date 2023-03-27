@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route ('companies.dashboard') }}" class="btn custom-button back">Go to Dashboard</a>
        <div class="d-flex">
            <h2 class="m-3 ms-0">Edit {{ $company->name }} Profile</h2>

            <div class="ms-auto delete-profile">
                <a class="btn btn-outline-danger btn-block me-3" href="#" onclick="deleteProfile()">Delete Profile</a>
                <form action="{{ route('companies.delete', $company->id) }}" id="delete-profile-form" style="display:none" method="POST">
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
        <div class="col-sm-4">
            <div class="card m-3 ms-0">
                <div class="card-body">
                    <div class="image-cont">
                    @if ($company->logo)
                        <img src="{{ Storage::url($company->logo)}}" alt="">
                    @else
                        <img src="/images/user.png" alt="">
                    @endif
                    </div>
                    <hr>
                    <button class="btn reverse-custom-button btn-sm btn-block me-3" onclick="openDialogUpdate()">New Profile Logo</button>
                    @if ($company->logo)
                    <button class="btn btn-outline-danger btn-sm btn-block" onclick="deleteLogo()">Delete Profile Logo</button>
                        <form action="{{ route('companies.delete.logo', $company->id) }}" method="POST" id="delete-logo-form">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endif
                </div>
            </div>

        </div>

        <div class="col-sm-8">
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
                    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $company->name }}">
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $company->email }}">
                        </div>

        
                        <div class="form-group mt-3">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website" value="{{ $company->website }}">
                        </div>
        
                        <button class="btn custom-button mt-3 float-end">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card m-3 ms-0">
                <div class="card-body">
                    <h5>Modify Profile Data</h5>
                    <hr>

            {{-- Employees Table --}}
            @if ($empls->count())
            <table class="table table-hover employees-table">
                <thead>
                    <tr>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Actions</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($empls as $empl)
                        @if ($empl->company_id == $company->id)
                            <tr>
                                <td>{{ $empl->firstname}}</td>
                                <td>{{ $empl->lastname}}</td>
                                <td>{{ $empl->email}}</td>
                                <td>{{ $empl->phone}}</td>
                                <td><a href="{{ route('employees.edit', ['employee' => $empl->id]) }}" class="text-decoration-none muted-blue">Edit</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>

            </table>
            @endif
                </div>
            </div>
        </div>
    </div>
</div>
    
<!-- Modal for updating profile logo-->
<div class="update-logo-cont">
    <button class="close btn ms-auto" onclick="closeDialogUpdate()">X</button>
    <form action="{{ route('companies.update.logo', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="">Choose an Image</label>
            <input type="file" class="form-control-file mt-3" name="image">
        </div>

        <button class="btn custom-button ms-auto  mt-3">Update Profile Image</button>
    </form>
</div>
@endsection

@push('footer-scripts')
    <script>
        function deleteLogo() {
            var r = confirm("Are you sure you want to delete the profile logo?")
            if (r) {
                document.querySelector('form#delete-logo-form').submit()
            }
        }
        function deleteProfile() {
            var r = confirm("Are you sure you want to delete this profile?")
            if (r) {
                document.querySelector('form#delete-profile-form').submit()
            }
        }

        function openDialogUpdate() {
            document.querySelector('.update-logo-cont').classList.add("show");
        }

        function closeDialogUpdate() {
            document.querySelector('.update-logo-cont').classList.remove("show");
        }
    </script>
@endpush