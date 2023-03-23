@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">

        {{-- Headline --}}
            <div class="d-flex headline">
                <h2> Employees List</h2>
                
                    <div class="companies-menu">  
                        <a href="{{ route ('employees.create') }}" class="btn custom-button employees-button">+ Create profile</a>
                    </div>
            </div>

        {{-- Success Creation Message --}}
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
                
            @endif
            
        {{-- Employees Table --}}
            @if ($employees->count())
            <table class="table table-hover employees-table">
                <thead>
                    <tr>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Company</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Actions</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->firstname}}</td>
                        <td>{{ $employee->lastname}}</td>
                        <td>
                            @if ($comps->count())
                            @foreach ($comps as $comp)
                                @if ($comp->id === $employee->company_id)
                                    {{$comp->name}}
                                @endif
                            @endforeach
                        @endif
                        </td>
                        <td>{{ $employee->email}}</td>
                        <td>{{ $employee->phone}}</td>
                        <td><a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="text-decoration-none muted-blue">Edit</a></td>
                    </tr>
                        
                    @endforeach

                </tbody>

            </table>
            @endif


        {{-- Pagination --}}
            @if(isset($employees))
            <div class="pagination">
                @if($employees->currentPage() > 1)
                    <a href="{{ $employees->previousPageUrl() }}" class="custom-button employees-button">Previous</a>
                @endif
                
                @if($employees->hasMorePages())
                    <a href="{{ $employees->nextPageUrl() }}" class="custom-button employees-button">Next</a>
                @endif
            </div>
            @endif

        </div>
    </div>
</div>
    
@endsection