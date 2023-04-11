@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">

        {{-- Headline --}}
            <div class="d-flex headline">
                <h2>Lista e Studentëve</h2>
                
                    <div class="companies-menu">  
                        <a href="{{ route ('students.create') }}" class="btn login-button">+ Krijo Profil</a>
                    </div>
            </div>

        {{-- Success Creation Message --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
         {{-- Students Table --}}
         @if ($students->count())
         <table class="table table-hover employees-table">
             <thead>
                 <tr>
                     <td>NID</td>
                     <td>Emri</td>
                     <td>Mbiemri</td>
                     <td>Nr. Lëndë të bëra Subscribe</td>
                     <td>Modifiko</td>
                 </tr>
             </thead>

             <tbody>
                 @foreach ($students as $student)
                 <tr>
                     <td>{{ $student->nid}}</td>
                     <td>{{ $student->emer}}</td>
                     <td>{{ $student->mbiemer}}</td>
                     <td>{{ $crs->count() }}</td>
                     <td><a href="{{ route('students.edit', ['student' => $student->id]) }}" class="text-decoration-none matte-black">Edit</a></td>
                 </tr>
                     
                 @endforeach

             </tbody>

         </table>
         @endif           


        {{-- Pagination --}}
            @if(isset($students))
            <div class="pagination mt-3">
                @if($students->currentPage() > 1)
                    <a href="{{ $students->previousPageUrl() }}" class="custom-button">Para</a>
                @endif
                
                @if($students->hasMorePages())
                    <a href="{{ $students->nextPageUrl() }}" class="custom-button">Pas</a>
                @endif
            </div>
            @endif

        </div>
    </div>
</div>
    
@endsection

@push('footer-scripts')

    <script>
        function deleteStudent() {
            document.querySelector("form#deleteStudent").submit();
        }
    </script>
    
@endpush