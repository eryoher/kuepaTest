<!DOCTYPE html>
<html>   
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <meta name="csrf-token" content="{{ csrf_token() }}">    
        <title>@yield('title')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> 
        
    </head> 
    <body>
        @section('menu')
        <div id="app">
            <nav class="navbar navbar-expand-lg bg-primary" >
                <div class="collapse navbar-collapse" id="homepage">
                    <ul class="navbar-nav mr-auto" style="color: white">                
                        <li class="nav-item">
                            <a class="navbar-brand" style="color: white" href="{{ url('/') }}">Home</a>     
                        </li>
                        <li class="nav-item ">                            
                            <div class=" links">
                                @auth
                                    <a class="navbar-brand" style="color: white" href="{{ url('/admin') }}">Admin</a>
                                @endauth
                            </div>                            
                        </li>                       
                    </ul>
                    @auth
                        <ul class="navbar-nav mr-auto" style="color: white">   
                            <li class="nav-item " style="color: white">                        
                                <div class="navbar-brand">
                                    Bienvenido {{ Auth::user()->name }} <span class="caret"></span>
                                </div>                        
                            </li>                                                       
                        </ul>
                        <div class="form-inline my-2 my-lg-0" aria-labelledby="aut">
                            <a class="" href="{{ route('logout') }}" style="color:white"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        
                    @else
                        <div class="nav-item">
                            <a class="nav-link" style="color: white" href="{{ route('register') }}">{{ __('Register') }}</a>                        
                        </div>
                        <div class="form-inline my-2 my-lg-0" aria-labelledby="aut">                            
                            <a  style="color:white" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>                            
                        </div>                    
                    @endauth
                    
                </div>
            </nav>
        </div>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>