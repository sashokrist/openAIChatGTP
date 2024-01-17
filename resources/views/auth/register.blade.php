@extends('layouts.app2')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{ route('register') }}" class="container mt-5">
                    @csrf
                    <!-- Name -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="name" class="form-label text-white">{{ __('Name') }}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                   required
                                   autofocus autocomplete="name">
                            @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Email Address -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="email" class="form-label text-white">{{ __('Email') }}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                   required
                                   autocomplete="username">
                            @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="password" class="form-label text-white">{{ __('Password') }}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" class="form-control" id="password" name="password" required
                                   autocomplete="new-password">
                            @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Confirm Password -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="password_confirmation"
                                   class="form-label text-white">{{ __('Confirm Password') }}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation"
                                   required autocomplete="new-password">
                            @error('password_confirmation')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-4">
                            <a class="text-decoration-none me-3 align-self-center text-white mr-3"
                               href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a><br>
                            <button type="submit"
                                    class="btn btn-primary text-white ml-4 mt-3">{{ __('Register') }}</button>
                        </div>
                        <div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @include('partials.footer')
@endsection
