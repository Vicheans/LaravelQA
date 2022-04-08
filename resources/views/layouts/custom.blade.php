<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
        <!-- you could use the method to see user auth state    -->
        
        <ul class="flex items-center">
            @guest   
            <li>
                    <a href="/home"  class="p-3">Home</a>
                </li>
                <li>
                    <a href="/posts" class="p-3">Posts</a>
                </li>
            @endguest
            @auth
                <li>
                    <a href="#" class="p-3">
                        <?php 
                        date_default_timezone_set("Asia/Kuwait");
                        echo "Today is " . date("d/m/Y, h:i:sa") . "<br>"; 
                        ?>
                    </a>
                </li>
            @endauth
            </ul>

            <ul class="flex items-center">
            @if (auth()->user())
                <li>
                    <a href="/home"  class="p-3">{{ auth()->user()->username }}</a>
                </li>
                <li>
                    <a href="{{ route('PostDashboard') }}" class="p-3">Dashboard</a>
                </li>
                <li>
                    <form action="{{ route('PostLogoutAction') }}" method="post">
                        @csrf
                        <button class="p-3" type="submit">Logout</button>
                    </form>
                </li>
                 @else
                 <li>
                    <a href="{{ route('PostLogin') }}" class="p-3">login</a>
                </li>
                <li>
                    <a href="{{ route('PostRegister') }}" class="p-3">Register</a>
                </li>
            @endif
            </ul>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </body>
</html>
