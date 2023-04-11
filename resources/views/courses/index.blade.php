@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">

        {{-- Headline --}}
            <div class="d-flex headline">
                <h2>Lista e Lëndëve</h2>
                
                    <div class="companies-menu">  
                        <a href="{{ route ('courses.create') }}" class="btn login-button">+ Krijo Profil</a>
                    </div>
            </div>

        {{-- Success Creation Message --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
         {{-- Courses Table --}}
         @if ($courses->count())
         <table class="table table-hover employees-table">
             <thead>
                 <tr>
                     <td>Lënda</td>
                     <td>Subscribe</td>
                     <td>Date</td>
                     <td>Informacion</td>
                     <td>Modifiko</td>
                 </tr>
             </thead>

             <tbody>
                 @foreach ($courses as $course)
                 <tr>
                     <td>{{ $course->name}}</td>
                     <td>{{ $course->subscribe}}</td>
                     <td>{{ $course->time}}</td>
                     <td>{{ $course->info}}</td>
                     <td><a href="{{ route('courses.edit', ['course' => $course->id]) }}" class="text-decoration-none matte-black">Edit</a></td>
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