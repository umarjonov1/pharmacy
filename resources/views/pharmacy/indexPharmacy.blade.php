@extends('layouts.pharmacy')

@section('header')
    <h1>
        ALL PHARMACIES
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
                    <th>Title</th>
                    <th>Address</th>
                    <th>Owner pharmacy</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pharmacies as $pharmacy)
                    <tr>
                        <td>{{ $pharmacy->id }}</td>
                        <td><a href="{{ route('pharmacy.medicinePharmacy', $pharmacy->id) }}">{{ $pharmacy->title }}</a></td>
                        <td>{{ $pharmacy->address }}</td>
                        <td>{{ $pharmacy->owner }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
