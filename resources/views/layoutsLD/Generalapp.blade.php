<!DOCTYPE html>
@if(App::isLocale('ar'))
    <html lang="ar" dir="rtl">
@elseif(App::isLocale('en'))
    <html lang="en">
@endif

<head>

    <style type="text/css" media="print">
        @media print {
            header{ display: none ; }
        }


    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{trans('settings.siteName')}}</title>


    <link rel="stylesheet" type="text/css" href="/css/all.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="/css/classic-min.css">



    <script type="text/javascript" src="/js/all.js"></script>
    <script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
    <script  src="/js/jquery-ui.js"></script>
    <script  src="/js/jquery.mousewheel.min.js"></script>
    <script  src="/js/jQDateRangeSlider-min.js"></script>
    <script  src="/js/bootbox.min.js"></script>





    <!-- Fonts -->
{{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
--}}


    <!-- Styles -->
{{--
     <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
--}}

    {{--<style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>--}}
</head>
<body >
<div class="header-area" >
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        @include('layouts.loginButtons')
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">
                   {{-- <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                                <span class="key">{{trans('settings.language')}}: </span><span class="value">{{App::isLocale('ar')?'العربية':'English'}} </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @include('layouts.lang')
                            </ul>
                        </li>
                    </ul>--}}
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->


<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="logo" dir="ltr">
                    <img src="{{asset('storage/logo.png')}}" alt="E-Learning" width="370px">
                </div>
            </div>

            {{--<div class="col-sm-6">
                <div class="shopping-item">
                    <a href="cart.html">Cart - <span class="cart-amunt">$800</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                </div>
            </div>--}}
        </div>
    </div>
</div> <!-- End site branding area -->


   {{-- <nav class="navbar navbar-default navbar-static-top">
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
    </nav>--}}

    <div class="content">
        </br>
        @yield('content')
    </div>


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
