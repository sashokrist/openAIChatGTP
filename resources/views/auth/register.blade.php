<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenAI Chat</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        p {
            margin: 0;
            color: white;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: bold;
            color: white;
        }

        .container {
            max-width: 100%;
            background: #343541;
            margin: auto;
            padding: 20px;
        }

        .chat-box {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #343541;
            color: white;
            font-size: 18px;
            height: 300px;
            overflow-y: auto;
        }

        .card-custom {
            background: #343541;
        }

        .response {
            background-color: black;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }

        .sidebar {
            border: 1px solid #ddd;
            background-color: black;
            width: 100%;
            resize: both; /* Make div resizable in both directions */
            overflow: auto; /* Add scrollbars as necessary */
            max-height: 600px; /* Set a maximum height */
            padding: 10px;
        }


        button {
            background-color: #343541;
            color: white;
            border: 1px solid white;
        }

        button:hover {
            background-color: #343541;
            color: white;
            border: 1px solid white;
        }

        .question {
            cursor: pointer; /* Changes the mouse cursor to a pointer to indicate it's clickable */
        }

        .question:hover {
            color: #007bff; /* Change to your preferred hover color */
        }
    </style>
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
                <form method="POST" action="{{ route('register') }}" class="container mt-5">
                    @csrf
                    <!-- Name -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="name" class="form-label text-white">{{ __('Name') }}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required
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
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required
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
                            <label for="password_confirmation" class="form-label text-white">{{ __('Confirm Password') }}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                   required autocomplete="new-password">
                            @error('password_confirmation')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 offset-md-4">
                            <a class="text-decoration-none me-3 align-self-center text-white mr-3" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a><br>
                            <button type="submit" class="btn btn-primary text-white ml-4">{{ __('Register') }}</button>
                        </div>
                        <div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
</body>
</html>
