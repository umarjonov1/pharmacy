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
            <div class="table-responsive cart_info">
                @if($medicines->isEmpty())
                    <p>Список избранного пуст.</p>
                @else
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Description</td>
                            <td class="price">Price</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody id="wishlist-list">
                        @forelse($medicines as $medicine)
                            <tr data-wishlist-row data-id="{{ $medicine->id }}">
                                <td class="cart_product">
                                    <a href=""><img src="/public/extensions/images/cart/two.png" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $medicine->title }}</a></h4>
                                </td>
                                <td class="cart_price">
                                    <p>${{ $medicine->price }}</p>
                                </td>
                                <td class="cart_delete">
                                    @include('inc.partials.wishlist-button', ['medicine' => $medicine])
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        {{----}}
                        </tbody>
                        <tbody id="wishlist-empty" @if($medicines->isNotEmpty()) style="display:none" @endif>
                        <tr>
                            <td colspan="4">List of WISHLIST is empty</td>
                        </tr>
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="container" style="text-align: center; margin-bottom: 50px;">
                <h3><a href="{{ route('pages.index') }}">Buy medicines</a></h3>

            </div>
        </div>
    </section> <!--/#cart_items-->

@endsection
