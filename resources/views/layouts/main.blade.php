
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="/public/extensions/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/extensions/css/font-awesome.min.css" rel="stylesheet">
    <link href="/public/extensions/css/prettyPhoto.css" rel="stylesheet">
    <link href="/public/extensions/css/price-range.css" rel="stylesheet">
    <link href="/public/extensions/css/animate.css" rel="stylesheet">
    <link href="/public/extensions/css/main.css" rel="stylesheet">
    <link href="/public/extensions/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/public/extensions/js/html5shiv.js"></script>
    <script src="/public/extensions/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/public/extensions/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/public/extensions/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/public/extensions/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/public/extensions/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/public/extensions/images/ico/apple-touch-icon-57-precomposed.png">

{{--    yandex map --}}
{{--    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>--}}
    <script src="https://api-maps.yandex.ru/2.1/?apikey=8535515a-98b0-4745-9fcb-ff64a270a54d&lang=ru_RU" type="text/javascript"></script>


</head><!--/head-->

<body>
@include('inc.header')

@include('inc.slider')

<section>
    <div class="container">

        @yield('content')

    </div>
</section>

@include('inc.footer')


<script src="/public/extensions/js/jquery.js"></script>
<script src="/public/extensions/js/bootstrap.min.js"></script>
<script src="/public/extensions/js/jquery.scrollUp.min.js"></script>
<script src="/public/extensions/js/price-range.js"></script>
<script src="/public/extensions/js/jquery.prettyPhoto.js"></script>
<script src="/public/extensions/js/main.js"></script>
</body>
</html>
