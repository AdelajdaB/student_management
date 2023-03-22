@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">

        {{-- Headline --}}
            <div class="d-flex headline">
                <h2>Companies Profile</h2>
                
                    <div class="companies-menu">  
                        <a href="{{ route ('companies.create') }}" class="btn custom-button">+ Create profile</a>
                    </div>
            </div>

        {{-- Success Creation Message --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
        {{-- Companies Card --}}
            @if ($companies->count())
                {{-- {{ $companies->links() }} --}}
                @foreach ($companies as $company)
                    @include('companies.partials.company-card', ['company' => $company])
                @endforeach            
            @endif


        {{-- Pagination --}}
            @if(isset($companies))
            <div class="pagination mt-3">
                @if($companies->currentPage() > 1)
                    <a href="{{ $companies->previousPageUrl() }}" class="custom-button">Previous</a>
                @endif
                
                @if($companies->hasMorePages())
                    <a href="{{ $companies->nextPageUrl() }}" class="custom-button">Next</a>
                @endif
            </div>
            @endif

        </div>
    </div>
</div>
    
@endsection

@push('footer-scripts')

    <script>
        function deleteCompany() {
            document.querySelector("form#deleteCompany").submit();
        }
    </script>
    
@endpush