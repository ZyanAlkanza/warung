<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link  rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets/fontawesome/css/all.min.css') }}" />

    <!-- CSS -->
    @stack('css')

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">

    <title>Warung</title>
</head>
<body>
    <div class="halaman">

        @yield('content')

    </div>

    <!-- Javascript -->
    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    
</body>
</html>
