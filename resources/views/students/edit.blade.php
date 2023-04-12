@extends('layouts.app')

@section('content')

<div class="container">
        <div class="d-flex">
            <h2 class="m-3 ms-0">Edito Profilin {{ $student->nid }}</h2>

            <div class="ms-auto delete-profile">
                <a class="btn btn-outline-danger btn-block me-3" href="#" onclick="deleteProfile()">Fshi Profilin</a>
                <form action="{{ route('students.delete', $student->id) }}" id="delete-profile-form" style="display:none" method="POST">
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
                    <h5>Modifiko Profilin e Studentit</h5>
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
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
        
                        <div class="form-group">
                            <label for="nid">NID</label>
                            <input type="text" class="form-control" name="nid" value="{{ $student->nid }}" readonly>
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="emer">Emri</label>
                            <input type="text" class="form-control" name="emer" value="{{ $student->emer }}">
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="mbiemer">Mbiemri</label>
                            <input type="text" class="form-control" name="mbiemer" value="{{ $student->mbiemer }}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="nota">Nota Mesatare</label>
                            <input type="number" step="0.01" class="form-control" name="nota" value="{{ $student->nota }}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="profesioni">Profesioni i dëshiruar</label>
                            <input type="text" class="form-control" name="profesioni" value="{{ $student->profesioni }}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="info">Informacione të shkollimit</label>
                            <textarea type="text" class="form-control" rows="4" cols="50" name="info" value="{{ $student->info }}">
                                Të dhëna të përgjithshme të shkollimit
                            </textarea>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="lendet">Lëndët</label>
                            @if ($crs->count())
                                <table class="table table-hover">
                                    <thead>
                                        <td>Lënda</td>
                                        <td>Subscribe</td>
                                        <td>Date</td>
                                        <td>Informacione</td>
                                    </thead>

                                    <tbody>
                                        @foreach ($crs as $cr)
                                            <tr>
                                                <td>{{ $cr->name}}</td>
                                                <td>
                                                    <input type="checkbox" name="subscribe" class="subscribe" id="{{$cr->name}}" value="1" {{ old('subscribe') == 1 ? 'checked' : '' }}/>
                                                </td>
                                                <td>{{ $cr->updated_at}}</td>
                                                <td>{{ $cr->info}}</td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="fjalekalim">Fjalëkalimi <span>(Rifut fjalëkalimin aktual ose fjalëkalimin e ri që do të përdoresh)</span></label>
                            <input type="password" minlength="8" class="form-control" name="fjalekalim"  value="{{ $student->fjalekalim }}" pattern="^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$"  required>
                        </div>

                        <div class="buttons">
                            <button class="btn custom-button mt-3 float-end save" id="save">Ruaj ndryshimet</button>
                        </div>
        
                        <a href="{{ route ('students.dashboard') }}" class="btn btn-danger btn-block mt-3 me-3">Anullo</a>
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