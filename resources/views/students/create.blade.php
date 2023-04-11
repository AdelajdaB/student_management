@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h2>Krijo Profil Studenti</h2>
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

            <form action="{{ route ('students.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nid">NID</label>
                    <input type="text" class="form-control" name="nid">
                </div>

                <div class="form-group mt-3">
                    <label for="emer">Emri</label>
                    <input type="text" class="form-control" name="emer">
                </div>

                <div class="form-group mt-3">
                    <label for="mbiemer">Mbiemri</label>
                    <input type="text" class="form-control" name="mbiemer">
                </div>

                
                <div class="form-group mt-3">
                    <label for="fjalekalim">Fjalëkalimi <span>(Formati: Minimumi 8 karaktere dhe të paktën një shkronjë e madhe dhe një numër)</label>
                    <input type="password" minlength="8" class="form-control" name="fjalekalim" pattern="^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$" required>
                </div>

                <a href="{{ route ('students.dashboard') }}" class="btn btn-danger btn-block mt-3 me-3 float-start">Anullo</a>
                <button class="btn custom-button mt-3 float-end">Krijo Profilin</button>
            </form>

        </div>
    </div>
</div>
    
@endsection