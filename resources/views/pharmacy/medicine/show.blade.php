@extends('layouts.pharmacy')

@section('header')
    <h1>
        Medicine information
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
                <form action="{{ route('pharmacy.medicine.delete', $medicine->id) }}" method="post" style="display:inline-block" class="me-2">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>

                <a href="{{ route('pharmacy.medicine.edit', $medicine->id) }}" class="btn btn-success">Edit</a>
            </div>

            <table id="example1" class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <td>{{ $medicine->id }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $medicine->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $medicine->description }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>${{ $medicine->price }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{ $medicine->category->title ?? 'Category not connected' }}</td>
                </tr>
                <tr>
                    <th>Pharmacy</th>
                    <td>{{ $medicine->pharmacy->title ?? 'Pharmacy not connected'}}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><img src="/public/uploads/{{ $medicine->image ?? 'no image.png' }}" alt="" height="100" width="150"></td>
                </tr>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
