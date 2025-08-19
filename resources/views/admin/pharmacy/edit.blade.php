@extends('layouts.admin')

@section('header')
    <h1>
        Добавить пользователя
        <small>приятные слова..</small>
    </h1>
@endsection

@section('content')
    <div class="box">
        <form action="{{ route('admin.pharmacy.update', $pharmacy->id) }}" method="post">
            @csrf
            @method('patch')


            <div class="box-header with-border">
                <h3 class="box-title">Добавляем пользователя</h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input value="{{ $pharmacy->title }}" name="title" type="text" class="form-control"
                               id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input value="{{ $pharmacy->address }}" name="address" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Owner Pharmacy</label>
                        <input value="{{ $pharmacy->owner }}" name="owner" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label>Choose pharmacist</label>
                        <select class="form-control select2" style="width: 100%;" name="pharmacist">
                            @if ($pharmacy->pharmacist)
                                <option value="{{ $pharmacy->pharmacist }}" selected>Name: {{ $pharmacy->pharmacistUser->name }} Email: {{ $pharmacy->pharmacistUser->email }}</option>
                            @endif
                            @foreach($pharmacists as $pharmacist)
                                <option value="{{ $pharmacist->id }}">Name: {{ $pharmacist->name }} Email: {{ $pharmacist->email }}</option>
                            @endforeach
                        </select>
                    </div>
                   <div class="col-md-3">
                       <h3 class="title">Location of PHARMACY</h3>

                       <div class="form-group">
                           <label for="lat">Enter latitude </label>
                           <input name="lat" type="number" class="form-control" step="any" value="{{ $pharmacy->lat ?? old('lat') }}">
                       </div>
                       <div class="form-group">
                           <label for="lng">Enter longitude </label>
                           <input name="lng" type="number" class="form-control" step="any" value="{{ $pharmacy->lng ?? old('lng') }}">
                       </div>
                   </div>
                    <div id="map" style="width: 100%; height: 400px;"></div>

                </div>
            </div>
            <div class="box-footer">
                <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
        </form>
    </div>

    <script>
        var lat = parseFloat({{ $pharmacy->lat ?? '41.311081' }});
        var lng = parseFloat({{ $pharmacy->lng ?? '69.240562' }});
        var name = @json($pharmacy->title ?? 'Аптека');

        ymaps.ready(function () {
            var map = new ymaps.Map("map", {
                center: [lat, lng],
                zoom: 17
            });

            var placemark = new ymaps.Placemark([lat, lng], {
                balloonContent: name
            }, {
                draggable: true
            });

            map.geoObjects.add(placemark);

            placemark.events.add('dragend', function () {
                var coords = placemark.geometry.getCoordinates();
                document.querySelector('input[name="lat"]').value = coords[0].toFixed(8);
                document.querySelector('input[name="lng"]').value = coords[1].toFixed(8);
            });

            map.events.add('click', function (e) {
                var coords = e.get('coords');
                placemark.geometry.setCoordinates(coords);
                document.querySelector('input[name="lat"]').value = coords[0].toFixed(8);
                document.querySelector('input[name="lng"]').value = coords[1].toFixed(8);
            });
        });
    </script>




@endsection
