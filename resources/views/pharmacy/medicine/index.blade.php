@extends('layouts.pharmacy')

@section('header')
    <h1>
        All medicine
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
                <a href="{{ route('pharmacy.medicine.create') }}" class="btn btn-success">Добавить</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Pharmacy</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($medicines as $medicine)
                    <tr>
                        <td>{{ $medicine->id }}</td>
                        <td><a href="{{ route('pharmacy.medicine.show', $medicine->id) }}">{{ $medicine->title }}</a></td>
                        <td>{{ $medicine->description }}</td>
                        <td>${{ $medicine->price }}</td>
                        <td>{{ $medicine->category->title}}</td>
                        <td>{{ $medicine->pharmacy->title ?? 'Pharmacy not connected'}}</td>
                        <td><a href="{{ route('pharmacy.medicine.edit', $medicine->id) }}" class="fa fa-pencil"></a>
                            <form action="{{ route('pharmacy.medicine.delete', $medicine->id) }}" method="post">
                                @csrf
                                @method('delete')

                                <button
                                    class="btn btn-danger fa fa-remove"></button>
                            </form>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
