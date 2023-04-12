@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h2>Krijo Profil Lënde</h2>
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

            <form action="{{ route ('courses.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Lënda</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <input type="checkbox" name="state" class="subscribe" value="1" {{ old('state') == 1 ? 'checked' : '' }} style="display:none;"/>

                <div class="form-group mt-3">
                    <label for="info">Informacione</label>
                    <textarea type="text" class="form-control" rows="4" cols="50" name="info" placeholder="Të dhëna mbi lënden"></textarea>
                </div>

                <a href="{{ route ('courses.dashboard') }}" class="btn btn-danger btn-block mt-3 me-3 float-start">Anullo</a>
                <button class="btn custom-button mt-3 float-end">Krijo Profilin</button>
            </form>

        </div>
    </div>
</div>
    
@endsection