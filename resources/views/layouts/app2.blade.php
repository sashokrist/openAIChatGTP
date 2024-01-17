<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenAI Chat</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles (same as in register.blade.php) -->
    <!-- Add your custom styles here -->
</head>
<style>
    body{
        background: #343541;
    }

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
<body>
<div id="app">
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
                        <li>
                            <a class="nav-link" href="{{ route('openai.index') }}">{{ __('OpenAI') }}</a>
                        </li>
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
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @endauth
                </ul>
                @include('partials/language_switcher')
            </div>
        </div>
    </nav>
        <div class="container">
            @yield('content')
        </div>
</div>
</body>
</html>
