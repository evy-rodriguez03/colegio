<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layout.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layout.navbars.navbar')
            @yield('content')
        </div>

		<ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
			<li class="mx-6">
				<a href="{{ route('login.index') }}" class="font-semibold hover bg-indigo-700 py-3 px-4 rounded-md"> Login </a>

				</li>

				<li>
				<a href="{{ route('register.index') }}" class="font-semibold hover bg-indigo-700 py-3 px-4 rounded-md">Registrar </a>
			</li>
		</ul>
		
	  </nav>

	  @yield('content')
	  </body>
	</html>
