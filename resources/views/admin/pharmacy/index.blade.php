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
                <a href="{{ route('admin.pharmacy.create') }}" class="btn btn-success">Добавить</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Address</th>
                    <th>Owner pharmacy</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pharmacies as $pharmacy)
                    <tr>
                        <td>{{ $pharmacy->id }}</td>
                        <td><a href="{{ route('admin.pharmacy.show', $pharmacy->id) }}">{{ $pharmacy->title }}</a></td>
                        <td>{{ $pharmacy->address }}</td>
                        <td>{{ $pharmacy->owner }}</td>
                        <td><a href="{{ route('admin.pharmacy.edit', $pharmacy->id) }}" class="fa fa-pencil"></a>
                            <form action="{{ route('admin.pharmacy.delete', $pharmacy->id) }}" method="post"
                                  style="display:inline"
                                  onsubmit="return confirm('Do you really want delete?');">>
                                @csrf
                                @method('delete')

                                <button
                                    class="btn btn-danger fa fa-remove"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
