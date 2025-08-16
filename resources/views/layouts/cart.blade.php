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
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="/public/extensions/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="/public/extensions/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="/public/extensions/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/public/extensions/images/ico/apple-touch-icon-57-precomposed.png">

    {{--    wishlist--}}
    <script>window.__WISHLIST_IDS__ = @json($wishlistIds ?? []);</script>
    <style>
        .wishlist-badge {
            display: inline-block;
            min-width: 18px;
            padding: 2px 6px;
            font-size: 12px;
            line-height: 1;
            border-radius: 10px;
            background: #e60023;
            color: #fff;
            margin-left: 6px;
            font-weight: 600
        }

        .wishlist-toggle.is-in .label {
            font-weight: 600
        }
    </style>
    <style>
        /* Плавное исчезновение строки избранного */
        [data-wishlist-row]{
            transition: opacity .25s ease-out;
            will-change: opacity;
        }
        [data-wishlist-row].is-removing{
            opacity: 0;
            pointer-events: none;
        }
    </style>
</head><!--/head-->

<body>
@include('inc.header')

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
