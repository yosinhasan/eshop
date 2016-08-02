<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>404</title>
        <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/prettyPhoto.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/price-range.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/main.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/responsive.css') !!}" rel="stylesheet">
        <link rel="shortcut icon" href="{!! asset('images/ico/favicon.ico') !!}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{!! asset('images/ico/apple-touch-icon-144-precomposed.png') !!}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{!! asset('images/ico/apple-touch-icon-114-precomposed.png') !!}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{!! asset('images/ico/apple-touch-icon-72-precomposed.png') !!}">
        <link rel="apple-touch-icon-precomposed" href="{!! asset('images/ico/apple-touch-icon-57-precomposed.png') !!}">
    </head><!--/head-->

    <body>
        <div class="container text-center">
            <div class="logo-404">
                <a href="{{ url('/') }}"><img src="images/home/logo.png" alt="" /></a>
            </div>
            <div class="content-404">
                <img src="{!! asset('images/404/404.png') !!}" class="img-responsive" alt="" />
                <h1><b>{{ trans('error.OPPS') }}</b> {{ trans('error.not_found') }} </h1>
                <p>{{ trans('error.not_found_description') }} </p>
                <h2><a href="{{ url('/') }}">{{ trans('error.back_home') }} </a></h2>
            </div>
        </div>
        <script src="{!! asset('js/jquery.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('js/jquery.scrollUp.min.js') !!}"></script>
        <script src="{!! asset('js/price-range.js') !!}"></script>
        <script src="{!! asset('js/jquery.prettyPhoto.js') !!}"></script>
        <script src="{!! asset('js/main.js') !!}"></script>
    </body>
</html>