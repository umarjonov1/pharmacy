@extends('layouts.pharmacy')

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
            data-url="{--><!--{ route('pharmacy.order.updateStatus', $order->id) }}"
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
                        {{--                            <div class="form-group">--}}
                        {{--                                <select class="form-control" style="width: 100%;" name="status">--}}
                        {{--                                    <option value="{{ $order->status }}" selected>{{ $order->statusTitle }}</option>--}}

                        {{--                                    @foreach($order->orderList($order->status) as $k => $v)--}}
                        {{--                                        <option value="{{ $k }}">{{ $v }}</option>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </select>--}}
                        {{--                            </div>--}}
                        <select class="form-control statusSelect"
                                data-url="{{ route('pharmacy.order.updateStatus', $order->id) }}"
                                data-id="{{ $order->id }}">
                            <option value="{{ $order->status }}" selected>{{ $order->statusTitle }}</option>

                            @foreach($order->orderList($order->status) as $k => $v)
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                        </select>

                    </td>
                </tr>
                <tr>
                    <th>Courier</th>
                    <td>
                        <select class="form-control courierSelect"
                                data-url="{{ route('pharmacy.order.updateCourier', $order->id) }}"
                                data-id="{{ $order->id }}">
                            @if ($order->courier_id == null)
                                <option>Choose courier</option>
                            @endif
                            @foreach($order->allCouriers() as $k => $courier)
                                <option value="{{ $courier->id }}" {{ $order->courier_id == $courier->id ? 'selected' : '' }}>
                                    {{ $courier->name }}
                                </option>
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
            $(document).on('change', '.statusSelect', function () {
                const $this = $(this);
                const url = $this.data("url");
                const status = $this.val();
                const token = $('meta[name="csrf-token"]').attr('content');

                console.log("URL:", url);       // для отладки
                console.log("Status:", status); // для отладки

                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        status: status,
                        _token: token
                    },
                    success: function (res) {
                        alert("Статус успешно обновлён");
                        console.log("Ответ сервера:", res);
                    },
                    error: function (xhr) {
                        alert("Ошибка при обновлении статуса");
                        console.log("Ошибка:", xhr.responseText);
                    }
                });
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            $(document).on('change', '.courierSelect', function () {
                const $this = $(this);
                const url = $this.data("url");
                const courier_id = $this.val();
                const token = $('meta[name="csrf-token"]').attr('content');

                console.log("URL:", url);       // для отладки
                console.log("courier_id :", courier_id); // для отладки

                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        courier_id: courier_id,
                        _token: token
                    },
                    success: function (res) {
                        alert("Role успешно обновлён");
                        console.log("Ответ сервера:", res);
                    },
                    error: function (xhr) {
                        alert("Ошибка при обновлении role");
                        console.log("Ошибка:", xhr.responseText);
                    }
                });
            });
        });

    </script>
@endsection
