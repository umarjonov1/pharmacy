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
                <a href="{{ route('admin.user.create') }}" class="btn btn-success">Добавить</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ route('admin.user.show', $user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roleTitle }}</td>
                        <td><a href="{{ route('admin.user.edit', $user->id) }}" class="fa fa-pencil"></a>
                            <form action="{{ route('admin.user.delete', $user->id) }}" method="post">
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
