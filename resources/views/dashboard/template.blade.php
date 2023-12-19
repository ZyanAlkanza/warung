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
    {{-- <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" /> --}}

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}">

    <title>Warung</title>
</head>
<body>
    <div class="halaman">

        <!-- Menu Sidebar -->
        <div class="menu">

            <!-- Logo -->
            <div class="logo">
                <h1>Warung</h1>
            </div>

            <!-- Menu -->
            <ul> 
                <li>
                    <a href="{{ url('dashboard') }}">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('categories') }}">
                        <i class="fa-solid fa-tags"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('products') }}">
                        <i class="fa-solid fa-dice-d6"></i>
                        <span>Products</span>
                    </a>
                </li>
            </ul>

            <!-- Menu Keluar-->
            <ul class="logout">
                <li>
                    <a href="{{ url('logout') }}">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        @yield('content')

    </div>

    <!-- Javascript -->
    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    
</body>
</html>
