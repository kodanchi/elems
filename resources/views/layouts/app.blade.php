<!DOCTYPE html>
@if(App::isLocale('ar'))
    <html lang="ar" dir="rtl">
@elseif(App::isLocale('en'))
    <html lang="en">
@endif

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{trans('settings.siteName')}}</title>

    <script type="text/javascript" src="/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/all.css">

    @if(App::isLocale('ar'))
        <link rel="stylesheet" type="text/css" href="/css/css-ar.css">
    @elseif(App::isLocale('en'))
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    @endif


    <!-- Fonts -->
{{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
{{--
     <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
--}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

            @if(App::isLocale('ar'))
                <div class="navbar-header navbar-right">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ LaravelLocalization::getLocalizedURL(null,'/') }}">
                        {{trans('settings.siteName')}}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @include('layouts.lang')
                        @include('layouts.loginButtons')

                    </ul>

                <!-- Right Side Of Navbar -->
                    <div class="navbar-right">
                        @include('layouts.mainMenu')
                    </div>

                </div>



            @elseif(App::isLocale('en'))
                <div class="navbar-header ">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ LaravelLocalization::getLocalizedURL(null,'/') }}">
                        {{trans('settings.siteName')}}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                @include('layouts.mainMenu')

                <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        @include('layouts.loginButtons')
                        @include('layouts.lang')
                    </ul>
                </div>
            @endif



        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
{{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
--}}
{{--
     <script src="{{ elixir('js/app.js') }}"></script>
--}}
</body>
</html>
