@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
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
                                <label for="mbiemer">Mbiemer</label>
                                <input type="text" class="form-control" name="mbiemer">
                            </div>
            
                            
                            <div class="form-group mt-3">
                                <label for="fjalekalim">Fjalekalimi</label>
                                <input type="password" minlength="8" class="form-control" name="fjalekalim" required>
                            </div>
            
                            <button class="btn custom-button mt-3 float-end">Krijo Profilin</button>
                        </form>

                    <a href="{{ URL::previous() }}" class="btn btn-danger btn-block mt-3 me-3">Anullo</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
