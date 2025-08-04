@extends('layouts.courier')

@section('header')
    <h1>
        Courier information
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

                <a href="{{ route('courier.profile.edit', $user) }}" class="btn btn-success">Edit my profile</a>
            </div>

            <table id="example1" class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th>Role</th>
                    <td>{{ $user->roleTitle }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><img src="{{ asset('uploads/' . ($user->image ?? 'no image.png')) }}" alt="" height="100" width="150"></td>
                </tr>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
