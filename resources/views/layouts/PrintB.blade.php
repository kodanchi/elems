<!DOCTYPE html>
@if(App::isLocale('ar'))
    <html lang="ar" dir="rtl">
@elseif(App::isLocale('en'))
    <html lang="en">
@endif

<head>

    <style type="text/css" >

        footer {
            width: 100%;
        }

        body{
            letter-spacing: -2px;
        }


        thead   {display: table-header-group;   }

        tfoot   {display: table-footer-group;   }

        @page {
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            margin-top: 0.5cm;
            size:21cm 29.7cm;

        }
        @page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        }

        @media print {
            body, page {
                margin: 0;
            }
        }





    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{trans('settings.siteName')}}</title>




{{--
    <link rel="stylesheet" type="text/css" href="/css/all.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="/css/classic-min.css">--}}




    <link rel="stylesheet" type="text/css" href="C:\sites\elems\public\css\all.css">
    <link rel="stylesheet" type="text/css" href="C:\sites\elems\public\css\bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="C:\sites\elems\public\css\classic-min.css">



</head>
<body >
<div class="header-area" >
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">

                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">

                </div>
            </div>
        </div>
    </div>
</div>



<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="logo" dir="ltr">


                </div>
            </div>

        </div>
    </div>
</div>

        <div class="content">
            @yield('content')
        </div>



</body>
</html>
