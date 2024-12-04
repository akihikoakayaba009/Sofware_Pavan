<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pavan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="/css/css.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="./favico.ico" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                </svg>
                <span class="ml-3 text-xl">Pavan</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center space-x-4"> 
                <a href="{{ url('/') }}" class="hover:text-gray-900"><i class="bi bi-house-door-fill"></i> Home </a>
                <a href="{{ url('pedidos') }}" class="hover:text-gray-900"><i class="bi bi-box-arrow-in-right mr-2"></i> pedidos </a>
                <a href="{{ route('clientes.index') }}" class="hover:text-gray-900"><i class="bi bi-person-fill mr-2"></i> Clientes </a>
                <a href="{{ route('caminhao.index') }}" class="hover:text-gray-900"><i class="bi bi-truck mr-2"></i> Caminhões </a>
                <a href="{{ route('cart.index') }}" class="hover:text-gray-900"><i class="bi bi-cart-fill mr-2"></i> guardar Pedidos</a>
                <a class="nav-link" href="{{ route('denominacao_chassis.index') }}">Listar Chassis</a>

            @auth
                <span class="mr-3 text-gray-700 font-bold">{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="mr-5 hover:text-gray-900">Sair</button>
                </form>
            @endauth
            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
               <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="500.000000pt" height="500.000000pt" viewBox="0 0 500.000000 500.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,500.000000) scale(0.100000,-0.100000)"
fill="#000000" stroke="none">
<path d="M2258 3750 c-258 -54 -476 -170 -656 -349 -188 -187 -312 -427 -358
-695 -22 -127 -15 -377 15 -496 119 -476 473 -832 944 -951 117 -30 386 -37
517 -15 394 69 743 330 923 691 96 193 131 364 124 605 -6 238 -49 395 -160
588 -192 334 -502 553 -886 626 -117 22 -349 20 -463 -4z m429 -85 c511 -83
908 -488 984 -1005 18 -123 7 -322 -25 -443 -56 -218 -145 -374 -301 -532
-244 -247 -507 -359 -845 -359 -233 0 -420 51 -609 166 -531 324 -724 995
-443 1542 235 458 735 713 1239 631z"/>
<path d="M1908 3488 c-16 -12 -17 -84 -19 -989 -1 -537 1 -981 5 -987 5 -9 62
-12 191 -12 160 0 186 2 201 17 15 16 16 42 9 319 l-7 302 289 5 c263 4 295 6
363 27 197 59 335 172 421 345 67 136 86 295 54 462 -35 188 -164 357 -335
440 -151 74 -166 75 -690 80 -374 4 -468 2 -482 -9z m938 -348 c120 -62 177
-169 176 -335 -1 -169 -77 -277 -232 -331 -47 -16 -85 -19 -275 -19 l-220 0
-3 363 -2 363 243 -3 244 -3 69 -35z"/>
</g>
</svg>

                <span class="ml-3 text-xl">PAVAN</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2024 MARCOS PEDROSO 
               
          
            </span>
        </div>
    </footer>

</body>
</html>
