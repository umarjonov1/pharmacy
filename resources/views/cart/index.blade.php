@extends('layouts.cart')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            @if (!empty(session()->get("cart." . Auth::id(), [])))

                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Description</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $medicine)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="/public/extensions/images/cart/two.png" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $medicine['title'] }}</a></h4>
                                </td>
                                <td class="cart_price">
                                    <p>${{ $medicine['price'] }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        {{--                                    <a class="cart_quantity_up" href="{{ route('cart.plusProduct',  $medicine) }}"> + </a>--}}
                                        <a href="" class="cart_quantity_up plusProduct"
                                           data-url="{{ route('cart.plusProduct', $medicine['id']) }}"
                                           data-id="{{ $medicine['id'] }}">+</a>
                                        <input class="cart_quantity_input" type="text" name="quantity"
                                               value="{{ $medicine['quantity'] }}" autocomplete="off" size="2">
                                        {{--                                    <a class="cart_quantity_down" href="{{ route('cart.subProduct', $medicine) }}"> - </a>--}}
                                        <a href="" class="cart_quantity_up subProduct"
                                           data-url="{{ route('cart.subProduct', $medicine['id']) }}"
                                           data-id="{{ $medicine['id'] }}">-</a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">${{ $medicine['price'] * $medicine['quantity'] }}</p>
                                </td>
                                <td class="cart_delete">
                                    {{--                                <a class="cart_quantity_delete" href="{{ route('cart.remove', $medicine) }}"><i--}}
                                    {{--                                        class="fa fa-times"></i></a>--}}
                                    <a href="" class="cart_quantity_up removeProduct"
                                       data-url="{{ route('cart.remove', $medicine['id']) }}"
                                       data-id="{{ $medicine['id'] }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        {{----}}
                        </tbody>
                    </table>
                </div>
                <div class="container" style="text-align: center; margin-bottom: 50px;">
                    <h3><a href="{{ route('order.add') }}">Buy medicines</a></h3>

                </div>
            @else
                <div class="container" style="text-align: center; margin-bottom: 50px;">
                    <h3><a href="/">Выберать товары</a></h3>

                </div>
            @endif
        </div>
    </section> <!--/#cart_items-->

@endsection
