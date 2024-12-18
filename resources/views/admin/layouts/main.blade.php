<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - Voler Admin Dashboard')</title>


    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.css") }}">

    <link rel="stylesheet" href="{{ asset("assets/vendors/chartjs/Chart.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/simple-datatables/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/perfect-scrollbar/perfect-scrollbar.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/app.css") }}">
    <link rel="shortcut icon" href="{{ asset("assets/images/favicon.svg") }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('admin.layouts.sidebar')
        <div id="main">
            @include('admin.layouts.navbar')

            <div class="main-content container-fluid">
                @yield('content')
            </div>

            @include('admin.layouts.footer')
</body>

</html>
