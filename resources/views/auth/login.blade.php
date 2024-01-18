@extends('layouts.app2')

@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{ route('login') }}" class="container mt-5">
                @csrf
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')"/>
                <!-- Email Address -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="email" class="form-label text-white">{{ __('Email') }}</label>
                    </div>
                    <div class="col-md-8 input-field-container">
                        <input type="email" class="form-control" id="email" name="email" :value="old('email')" required
                               autofocus autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="text-danger mt-2"/>
                    </div>
                </div>
                <!-- Password -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="password" class="form-label text-white">{{ __('Password') }}</label>
                    </div>
                    <div class="col-md-8 input-field-container">
                        <input type="password" class="form-control" id="password" name="password" required
                               autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="text-danger mt-2"/>
                    </div>
                </div>
                <!-- Remember Me -->
                <div class="row mb-3">
                    <div class="col-md-8 input-field-container offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                            <label class="form-check-label text-white" for="remember_me">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 input-field-container offset-md-4">
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
    @include('partials.footer')
@endsection
