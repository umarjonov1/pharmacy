<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact | E-Shopper</title>
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
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="/public/extensions/"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="/public/extensions/"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="/public/extensions/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="/public/extensions/"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="/public/extensions/"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="/public/extensions/"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="/public/extensions/"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/public/extensions/index.html"><img src="/public/extensions/images/home/logo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="/public/extensions/">Canada</a></li>
                                <li><a href="/public/extensions/">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="/public/extensions/">Canadian Dollar</a></li>
                                <li><a href="/public/extensions/">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if ($role == 1)
                                <li><a href="{{ route('admin.index') }}">Admin panel</a></li>
                            @elseif ($role == 2)
                                <li><a href="{{ route('pharmacy.index') }}">Pharmacy panel</a></li>
                            @elseif ($role == 3)
                                <li><a href="{{ route('courier.index') }}">Courier panel</a></li>
                            @endif
                                <li>
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                            <button>Logout</button>
                                        </form>
                                    </div>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Welcome to the SITE</h2>
                <div id="gmap" class="contact-map">
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->





<script src="/public/extensions/js/jquery.js"></script>
<script src="/public/extensions/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/public/extensions/http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="/public/extensions/js/gmaps.js"></script>
<script src="/public/extensions/js/contact.js"></script>
<script src="/public/extensions/js/price-range.js"></script>
<script src="/public/extensions/js/jquery.scrollUp.min.js"></script>
<script src="/public/extensions/js/jquery.prettyPhoto.js"></script>
<script src="/public/extensions/js/main.js"></script>
</body>
</html>
