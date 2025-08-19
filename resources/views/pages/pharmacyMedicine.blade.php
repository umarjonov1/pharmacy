@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Pharmacies</h2>
                <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                    @foreach($pharmacies as $pharmacy)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{ route('pages.pharmacyMedicine', $pharmacy->id) }}">{{ $pharmacy->title }}</a></h4>
                            </div>
                        </div>
                    @endforeach

                </div><!--/category-products-->

                <div class="brands_products"><!--brands_products-->
                    <h2>Categories</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($categories as $category)
                                <li><a href="{{ route('pages.categoryMedicine', $category->id) }}"> <span class="pull-right">(50)</span>{{ $category->title }}</a></li>
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

            <div class="category-tab"><!--category-tab-->
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tshirt">
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
                    </div>
                    {{ $medicines->links('pagination::bootstrap-4') }}

                </div>
            </div><!--/category-tab-->

        </div>
    </div>
@endsection
