<!DOCTYPE html>
<html>   
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <meta name="csrf-token" content="{{ csrf_token() }}">    
        <title>@yield('title')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">       
    </head> 
    <body>
        @section('menu')
            <nav class="navbar navbar-expand-lg bg-primary" >
                <h5> <a class="navbar-brand" style="color: white" href="{{ url('/') }}">Home</a></h5>                
                <h5> <a class="navbar-brand" style="color: white" href="{{ url('/admin') }}">Admin</a></h5>
                <div class="collapse navbar-collapse" id="homepage">
                    <ul class="navbar-nav mr-auto" style="color: white">                
                        <li>
                            @if (Route::has('login'))
                            <div class=" links">
                                @auth
                                    <a style="color: white" href="{{ url('/home') }}">Home</a>
                                @else
                                    <a style="color: white" href="{{ route('login') }}">Login</a>

                                    @if (Route::has('register'))
                                        <a style="color: white" href="{{ route('register') }}">Registro</a>
                                    @endif
                                @endauth
                            </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </nav>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>