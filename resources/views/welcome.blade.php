<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student Management System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- Favicon --}}
        <link rel="icon" href="{{ url('images/logo.webp') }}">

        <!-- Styles -->


            <!-- Scripts -->
            @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="container relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

            <div class="row header-row flex-row">
                <div class="col-5 right-side flex-row align-items-center">
                    <img class="logo" src="images/logo.webp" alt="logo">
                    <h3>Sistemi i menaxhimit të studentëve</h3>
                </div>

                @if (Route::has('login'))
                <div class="actions ms-auto">
                    @auth
                        <a href="{{ route('students.dashboard') }}" class="text-decoration-none">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-decoration-none pe-3">Identifikohu</a>

                        <a href="{{ route('register') }}" class="text-decoration-none">Regjistrohu</a>

                    @endauth
                </div>
            @endif
            </div>

            <div class="row home flex-row align-items-center">
                <div class="col-md-6">

                    <h3 class="pb-4">Plotësoni të dhënat e mëposhtme për t’u identifikuar në sistemin e menaxhimit të studentëve:</h3>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">NID student</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Fjalëkalimi</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn login-button">
                                    Identifikohu
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class=" col-md-6 image">
                    <img src="\images\students.webp" alt="">
                </div>
            </div>
        </div>
    </body>
</html>
