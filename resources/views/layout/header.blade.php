<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body class="hold-transition login-page">
    <div class="container">
        @if (Auth::check())
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item
                        @if(request()->is('home'))
                            active
                        @endif
                    ">
                        <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item
                        @if(request()->is('photoslist') || request()->is('insertphoto'))
                            active
                        @endif
                    ">
                        <a class="nav-link" href="/photographslist">Photographs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="{{url('logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        @endif
        <div class="content">
@yield('content')