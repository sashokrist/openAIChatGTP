<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - OpenAI Chat</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles (same as in register.blade.php) -->
    <!-- Add your custom styles here -->
</head>

<body style="background: #343541">
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="">OpenAI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Right-aligned items -->
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                @include('partials/language_switcher')
            </div>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{ route('login') }}" class="container mt-5">
                @csrf

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Email Address -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="email" class="form-label text-white">{{ __('Email') }}</label>
                    </div>
                    <div class="col-md-8">
                        <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                    </div>
                </div>

                <!-- Password -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="password" class="form-label text-white">{{ __('Password') }}</label>
                    </div>
                    <div class="col-md-8">
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="row mb-3">
                    <div class="col-md-8 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                            <label class="form-check-label text-white" for="remember_me">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 offset-md-4">
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none me-3 align-self-center text-white"
                               href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <button type="submit" class="btn btn-primary text-white ml-4">{{ __('Log in') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
