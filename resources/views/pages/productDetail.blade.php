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
<?php

use App\User;

?>
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
                        <h2>Brands</h2>
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
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                   data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="/public/extensions/images/home/shipping.jpg" alt=""/>
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="/public/extensions/images/home/shipping.jpg" alt="">
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href=""><img src="/public/extensions/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/public/extensions/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/public/extensions/images/product-details/similar3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="/public/extensions/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/public/extensions/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/public/extensions/images/product-details/similar3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="/public/extensions/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/public/extensions/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/public/extensions/images/product-details/similar3.jpg" alt=""></a>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="/public/extensions/images/product-details/new.jpg" class="newarrival" alt=""/>
                            <h2>Anne Klein Sleeveless Colorblock Scuba</h2>
                            <p>Web ID: 1089772</p>
                            <img src="/public/extensions/images/product-details/rating.png" alt=""/>
                            <span>
									<span>US $59</span>
									<label>Quantity:</label>
									<input type="text" value="3"/>
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> E-SHOPPER</p>
                            <a href=""><img src="/public/extensions/images/product-details/share.png"
                                            class="share img-responsive" alt=""/></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                <div class="tab-pane fade active in" id="reviews">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                            <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <div id="comments-list">
                            @foreach($medicine->comments as $comment)
                                <div class="comment">
                                    <div class="comment-avatar">
                                        <img src="{{ isset($comment->user->image) ? asset('uploads/'.$comment->user->image) : asset('images/no-image.png') }}" width="48" height="48">
                                    </div>
                                    <div class="comment-content">
                                        <strong>{{ $comment->user->name }}</strong>
                                        <span>{{ $comment->created_at->translatedFormat('d F Y') }}</span>
                                        <span>{{ $comment->created_at->format('g:i a') }}</span>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        </div>


                    </div>
                    <p><b>Write Your Review</b></p>
                <form id="comment-form" action="{{ route('comment.add', $medicine->id) }}" method="post">
                    @csrf
                    <textarea name="comment" required></textarea>
                    <button type="submit" class="btn btn-default pull-right">Submit</button>
                </form>
                </div>
            </div>

            <div class="recommended_items"><!--recommended_items-->
                <h2 class="title text-center">recommended items</h2>

            </div><!--/recommended_items-->

        </div>
</section>

@include('inc.footer')


<script src="/public/extensions/js/jquery.js"></script>
<script src="/public/extensions/js/bootstrap.min.js"></script>
<script src="/public/extensions/js/jquery.scrollUp.min.js"></script>
<script src="/public/extensions/js/price-range.js"></script>
<script src="/public/extensions/js/jquery.prettyPhoto.js"></script>
<script src="/public/extensions/js/main.js"></script>
{{--add comment--}}
    <script>
        $(function () {
            const $form = $('#comment-form');
            const $btn  = $form.find('button[type="submit"]');

            // Сбросим возможные предыдущие обработчики и повесим namespaced
            $form.off('submit.comment').on('submit.comment', function (e) {
                e.preventDefault();

                // если уже отправляется — выходим (анти дабл-клик)
                if ($btn.prop('disabled')) return;

                $btn.prop('disabled', true);

                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: $form.serialize(),
                    dataType: 'json', // ожидаем JSON (если не JSON — уйдёт в error)
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    success: function (response) {
                        if (response && response.status === 'success') {
                            const c = response.comment;

                            // Собираем DOM безопасно (без raw HTML интерполяции текста)
                            const $item = $('<div class="comment">');
                            const $ava  = $('<div class="comment-avatar">').append(
                                $('<img>', {src: c.avatar, width: 48, height: 48, alt: c.user_name})
                            );
                            const $meta = $('<div class="comment-content">')
                                .append($('<strong>').text(c.user_name))
                                .append($('<span>').text(' ' + c.date + ' '))
                                .append($('<span>').text(c.time))
                                .append($('<p class="comment-text">').text(c.text));

                            $item.append($ava).append($meta);

                            $('#comments-list').append($item);
                            $form[0].reset();
                        } else if (response && response.status === 'ignored_duplicate') {
                            // Ничего не делаем, просто разблокируем кнопку
                        } else {
                            console.warn('Unexpected response', response);
                            alert('Неожиданный ответ сервера');
                        }
                    },
                    error: function (xhr) {
                        console.error('AJAX error', xhr.status, xhr.responseText);
                        alert('Ошибка при добавлении комментария');
                    },
                    complete: function () {
                        $btn.prop('disabled', false);
                    }
                });
            });
        });
    </script>



</body>
</html>
