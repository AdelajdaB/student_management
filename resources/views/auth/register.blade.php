@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
            
                            <div class="form-group">
                                <label for="email">NID</label>
                                <div>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                               
                            </div>
            
                            <div class="form-group mt-3">
                                <label for="name">Emri</label>
                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                               
                            </div>

                            <div class="form-group mt-3">
                                <label for="surname">Mbiemri</label>
                                <div>
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}">

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                               
                            </div>                           
                                     
                            <div class="form-group mt-3">
                                <label for="password">Fjalekalimi</label>
                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                               
                            </div>

                            <div class="form-group mt-3">
                                <label for="password-confirm">Konfirmo Fjalekalimin</label>
                                <div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
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

