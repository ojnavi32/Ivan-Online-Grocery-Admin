<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard | Admire</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="img/logo1.ico"/>

    @include('layouts.includes.styles')
    @yield('styles')
</head>

<body class="body">
<div class="preloader" style=" position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 100000;
    backface-visibility: hidden;
    background: #ffffff;">

    <div class="preloader_img" style="width: 200px;
        height: 200px;
        position: absolute;
        left: 48%;
        top: 48%;
        background-position: center;
        z-index: 999999">
        <img src="/img/loader.gif" style=" width: 40px;" alt="loading...">
    </div>
</div>
<div id="app">
    <div class="bg-dark" id="wrap">
        <div id="top">
            <!-- .navbar -->
            @include('layouts.includes.navbar')
        </div>
        <!-- /#top -->
        <div class="wrapper">
            @include('layouts.includes.sidebar')
            <div id="content" class="bg-container">
                <div class="outer">
                    <div class="inner bg-container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- # right side -->
    </div>
</div>

@include('layouts.includes.scripts')

</body>
</html>
