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

    {{--    yandex map --}}
    {{--    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>--}}
    <script src="https://api-maps.yandex.ru/2.1/?apikey=8535515a-98b0-4745-9fcb-ff64a270a54d&lang=ru_RU"
            type="text/javascript"></script>


</head><!--/head-->

<body>
@include('inc.header')

<section>
    <div class="container">

        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Pharmacies</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach($pharmacies as $pharmacy)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a
                                            href="{{ route('pages.pharmacyMedicine', $pharmacy->id) }}">{{ $pharmacy->title }}</a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach

                    </div><!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Categories</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($categories as $category)
                                    <li><a href="{{ route('pages.categoryMedicine', $category->id) }}"> <span
                                                class="pull-right">(50)</span>{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                   data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="/public/extensions/images/home/shipping.jpg" alt=""/>
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="category-tab">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tshirt">
                            @if ($medicines->isEmpty())
                                <h2>Medicine not found</h2>
                            @else
                                @foreach($medicines as $medicine)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="{{ route('pages.productDetails', $medicine->id) }}"><img
                                                            src="/public/extensions/images/home/gallery4.jpg" alt=""/></a>
                                                    <h2>${{ $medicine->price }}</h2>
                                                    <p>{{ $medicine->title }}</p>
                                                    <a href="" data-url="{{ route('cart.add', $medicine) }}"
                                                       data-id="{{ $medicine->id }}"
                                                       class="btn btn-default addCart">

                                                        <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    <a href="{{ route('like.medicine', $medicine) }}"
                                                       class="like-btn {{ $medicine->is_liked ? 'active' : '' }}">
                                                        <i class="fa fa-thumbs-up"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li>@include('inc.partials.wishlist-button')
                                                    </li>
                                                    <li><a href="/public/extensions/#"><i class="fa fa-plus-square"></i>Add to compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div><!--/category-tab-->

            </div>
        </div>


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
