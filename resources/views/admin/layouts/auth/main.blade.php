<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sign in - Voler Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.css") }}">

    <link rel="shortcut icon" href="{{ asset("assets/images/favicon.svg") }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset("assets/css/app.css") }}">
</head>

<body>
    <div id="auth">

        <div class="container">
            @yield('content')
        </div>

    </div>
    <script src="{{ asset("assets/js/feather-icons/feather.min.js") }}"></script>
    <script src="{{ asset("assets/js/app.js") }}"></script>

    <script src="{{ asset("assets/js/main.js") }}"></script>
</body>

</html>
