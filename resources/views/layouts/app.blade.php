<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty</title>
</head>
<body class="bg-gray-200">

    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex item-center">
            <li class="p-3"><a href="/">Home</a></li>
            <li class="p-3"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="p-3"><a href="{{ route('posts') }}">Post</a></li>
        </ul>

        <ul class="flex item-center">
            @auth
            {{-- <li class="p-3"><a href="">Adebayo Rilwan Ajibola</a></li> --}}
            <li class="p-3"><a href="#">Welcome, <b>{{ auth()->user()->username }}</b></a></li>
            <li class="p-3">
                <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            @endauth
            @guest
            <li class="p-3"><a href="#">Welcome, <b>Guest</b></a></li>
            <li class="p-3"><a href="{{ route('login') }}">Login</a></li>
            <li class="p-3"><a href="{{ route('register') }}">Register</a></li>
            @endguest
        </ul>

    </nav>

    @yield('content')
</body>
</html>