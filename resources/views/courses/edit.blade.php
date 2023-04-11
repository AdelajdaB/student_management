@extends('layouts.app')

@section('content')

<div class="container">
        <div class="d-flex">
            <h2 class="m-3 ms-0">Edito Profilin {{ $course->name }}</h2>

            <div class="ms-auto delete-profile">
                <a class="btn btn-outline-danger btn-block me-3" href="#" onclick="deleteProfile()">Fshi Profilin</a>
                <form action="{{ route('courses.delete', $course->id) }}" id="delete-profile-form" style="display:none" method="POST">
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
                    <h5>Modifiko Profilin e Lendes</h5>
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
                    <form action="{{ route('courses.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT')
        
                        <div class="form-group">
                            <label for="name">Lenda</label>
                            <input type="text" class="form-control" name="name" value="{{ $course->name }}">
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="info">Informacione</label>
                            <textarea type="text" class="form-control" rows="4" cols="50" name="info" placeholder="Te dhena mbi lenden"  value="{{ $course->info }}"></textarea>
                        </div>

                        <div class="buttons">
                            <button class="btn custom-button mt-3 float-end">Ruaj ndryshimet</button>
                        </div>
        
                        <a href="{{ route ('courses.dashboard') }}" class="btn btn-danger btn-block mt-3 me-3">Anullo</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

@push('footer-scripts')
    <script>
        function deleteProfile() {
            var r = confirm("Jeni I sigurt qe doni te fshini rekordin?!")
            if (r) {
                document.querySelector('form#delete-profile-form').submit()
            }
        }
    </script>
@endpush