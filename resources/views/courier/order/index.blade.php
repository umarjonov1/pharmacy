@extends('layouts.courier')

@section('header')
    <h1>
        All <b>orders</b>
        <small>it all starts here</small>
    </h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Листинг сущности</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                        @if ($order->product)
                            <a href="{{ route('courier.order.show', $order->id) }}">{{ $order->user->name }}</a>
                        @else
                            {{ $order->user->name }}
                        @endif
                        </td>
                        <td>{{ $order->product->title ?? 'Medicine not available'}}</td>
                        <td>${{ $order->price }}</td>
                        <td>{{ $order->quantity}}</td>
                        <td>${{ $order->total_coast}}</td>
                        <td style="background-color: {{ $order->deliveryColors()[$order->delivery] }}; color: black">
                            {{ $order->delivery }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
