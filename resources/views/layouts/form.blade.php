<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pavan') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons for extra UI elements -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Styles (Vite or any other stylesheets) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
 
    <style>
        /* Custom Styling for Navbar */
        .navbar {
            background-color: #007bff; /* Navbar background color (blue) */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow for depth */
        }

        .navbar-brand {
            font-weight: bold;
            color: black;
            font-size: 1.5rem;
        }

        .navbar-brand:hover {
            color: #ffeb3b; /* Highlight the brand on hover */
        }

        .nav-link {
            color: black !important; /* Ensure text color is white */
            font-weight: 500;
            transition: color 0.3s ease; /* Smooth color change on hover */
        }

        .nav-link:hover {
            color: #ffeb3b !important; /* Highlight color on hover */
            text-decoration: underline; /* Add underline on hover */
        }

        /* Navbar dropdown items */
        .dropdown-menu {
            border-radius: 8px;
        }

        .dropdown-item {
            color: #007bff; /* Use blue color for dropdown items */
            padding: 10px 15px;
        }

        .dropdown-item:hover {
            background-color: #f0f0f0;
            border-radius: 8px;
        }

        /* Improved form design */
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-control {
            border-radius: 8px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        .btn-primary {
            background-color: #28a745; /* Green button */
            border-color: #28a745;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #218838; /* Darker green on hover */
            border-color: #1e7e34;
        }

        .btn-primary:focus, .btn-primary:active {
            box-shadow: 0 0 0 0.25rem rgba(72, 236, 128, 0.5);
        }

        /* Form Group Enhancements */
        .form-group label {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        /* Improved spacing and margins */
        .py-4 {
            padding-top: 50px;
            padding-bottom: 50px;
        }
        
        /* Page background */
        body {
            background-color: #f4f7fc;
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="bi bi-house-door-fill"></i> {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a href="{{ url('pedidos') }}" class="navbar-brand">
            <i class="bi bi-box-arrow-in-right mr-2"></i> Pedidos 
        </a>

        <a href="{{ route('clientes.index') }}" class="navbar-brand">
            <i class="bi bi-person-fill mr-2"></i> Clientes
        </a>

        <a href="{{ route('caminhao.index') }}" class="navbar-brand">
            <i class="bi bi-truck mr-2"></i> Caminhões
        </a>
        <a href="{{ route('cart.index') }}" class="navbar-brand">
            <i class="bi bi-cart-fill mr-2"></i> Carrinho(guardar Pedidos)
        </a>



                <div class="navbar-brand" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                    @auth
        <span class="mr-3 text-gray-700 font-bold">{{ auth()->user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="mr-5 hover:text-gray-900 flex items-center">
                <i class="bi bi-box-arrow-right mr-2"></i> Sair
            </button>
        </form>
    @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
