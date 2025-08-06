@extends('layouts.admin')

@section('header')
    <h1>
        Blank page
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
            <div class="form-group">
                <form action="{{ route('admin.pharmacy.delete', $pharmacy->id) }}" method="post"
                      style="display:inline-block" class="me-2">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>

                <a href="{{ route('admin.pharmacy.edit', $pharmacy->id) }}" class="btn btn-success">Edit</a>
            </div>

            <table id="example1" class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <td>{{ $pharmacy->id }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $pharmacy->title }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $pharmacy->address }}</td>
                </tr>
                <tr>
                    <th>Owner pharmacy</th>
                    <td>{{ $pharmacy->owner }}</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>
                        <div id="map" style="  width: 50%;height: 500px;"></div>
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <script>
        var lat = {{ $pharmacy->lat }};
        var lng = {{ $pharmacy->lng }};
        ymaps.ready(function () {
            var map = new ymaps.Map("map", {
                center: [lat, lng], // Ташкент
                zoom: 17
            });

            // Добавим метку
            var placemark = new ymaps.Placemark([lat, lng], {
                balloonContent: 'Это PHARMACY'
            });

            map.geoObjects.add(placemark);
        });
    </script>

@endsection
