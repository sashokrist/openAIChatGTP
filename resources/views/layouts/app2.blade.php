<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenAI Chat</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Custom styles (same as in register.blade.php) -->
    <!-- Add your custom styles here -->
</head>
<style>
    body
    {
        background: #343541;
    }

    p
    {
        margin: 0;
        color: white;
    }

    h1, h2, h3, h4, h5, h6
    {
        font-weight: bold;
        color: white;
    }

    .container
    {
        max-width: 100%;
        background: #343541;
        margin: auto;
        padding: 20px;
    }

    .chat-box
    {
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #343541;
        color: white;
        font-size: 18px;
        height: 300px;
        overflow-y: auto;
    }

    .card-custom
    {
        background: #343541;
    }

    .response
    {
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

    @media (max-width: 991px) {
        .sidebar {
            max-height: 300px;
            overflow-y: auto;
        }
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

    .input-field-container {
        display: flex;
        justify-content: center; /* Horizontally center the content */
        align-items: center; /* Vertically center the content */
    }

    @media screen and (max-width: 768px) {
        .form-control {
            width: 300px; /* Set the width of input fields */
        }
    }
    }

</style>
<body>
<div id="app">
    @include('partials.navigation')
        <div class="container">
            @yield('content')
        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
