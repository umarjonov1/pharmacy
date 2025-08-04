@extends('layouts.courier')

@section('header')
    <h1>
        Show order
        <small>it all starts here</small>
    </h1>
@endsection

@section('content')
    <?php

    use App\User;

    ?>

    <select class="form-control statusSelect"
            data-url="{--><!--{ route('courier.order.updateStatus', $order->id) }}"
            data-id="{{ $order->id }}">

    </select>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Листинг сущности</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">

                <tr>
                    <th>ID</th>
                    <td>{{ $order->id }}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>{{ $order->user->name }}</td>
                </tr>
                <tr>
                    <th>Product</th>
                    <td>{{ $order->product->title ?? 'Medicine not available'}}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>${{ $order->price }}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $order->quantity}}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>${{ $order->total_coast}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <select class="form-control deliverySelect" style="background-color: {{ $order->deliveryColors()[$order->delivery] }}; color: black"
                                data-url="{{ route('courier.delivery.update', $order->id) }}"
                                data-id="{{ $order->id }}">
                            <option value="{{ $order->delivery }}" selected>{{ $order->delivery }}</option>

                            @foreach($order->deliveryStatus($order->delivery) as $k => $v)
                                <option value="{{ $k }}">{{ $k }}</option>
                            @endforeach
                        </select>

                    </td>
                </tr>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $(document).on('change', '.deliverySelect', function () {
                const $this = $(this);
                const url = $this.data("url");
                const delivery = $this.val();
                const token = $('meta[name="csrf-token"]').attr('content');

                console.log("URL:", url);       // для отладки
                console.log("Status:", delivery); // для отладки

                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        delivery: delivery,
                        _token: token
                    },
                    success: function (res) {
                        alert("Статус успешно обновлён");
                        location.reload();
                    },
                    error: function (xhr) {
                        alert("Ошибка при обновлении статуса");
                        console.log("Ошибка:", xhr.responseText);
                    }
                });
            });
        });

    </script>

@endsection
