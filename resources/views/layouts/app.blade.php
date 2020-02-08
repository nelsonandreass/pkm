<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>{{ config('app.name', 'Proposal') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <!-- <script src="https://cdn.tiny.cloud/1/t8pef6ezh4i32sfjg98xl2k1k4fujj8zrcwkp9wutch8fna4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('darkmode.scss') }}">
    <script src="https://kit.fontawesome.com/4640eb3b9c.js" crossorigin="anonymous"></script>
    <style>
        .mce-notification {display: none !important;}

        input[type='number'] {
            -moz-appearance:textfield;
        }
        
        /* Webkit browsers like Safari and Chrome */

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    
</head>
<body id="body" class="body">
    <div id="app">
        <nav id="nav" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">{{ __('Log In') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item mt-1">
                                <p class="mt-1"><a href="{{url('home')}}" style="color:#727274">{{ Auth::user()->name }}</a></p>   
                            </li>
                            <li class="nav-item mx-md-2 ">
                                @if(Auth::user()->roles == 'MAHASISWA')
                                    <a href="{{url('/profile')}}" class="nav-link " style="color:#727274"><img src="/profile.png" width="30px" hegiht="30px" class="mr-1"></span>Profile</a>
                                @endif
						        
					        </li>
                        
                            <li>
                                <form action="{{url('logout')}}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary">Log Out<img src="/logout.png" width="20px" height="20px" class="ml-2" style="margin-top: -3px;"></button>
                                </form>
                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
    @include('script')
</body>
    <div class="mr-2 mb-2 mt-2" style="bottom:0; right:0; position:fixed;">
        <a href="{{ url('/feedback') }}">Give us your feedback</a>
    </div>
    
</html>
