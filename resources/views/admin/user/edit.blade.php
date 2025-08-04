@extends('layouts.admin')

@section('header')
    <h1>
        Добавить пользователя
        <small>приятные слова..</small>
    </h1>
@endsection

@section('content')
    <div class="box">
        <form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')


            <div class="box-header with-border">
                <h3 class="box-title">Добавляем пользователя</h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Имя</label>
                        <input value="{{ $user->name }}" name="name" type="text" class="form-control"
                               id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Пароль</label>
                        <input name="password" type="password" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" style="width: 100%;" name="role">
                            <option value="0">Customer</option>
                            <option value="1" selected="selected">Admin</option>
                            <option value="2">Pharmacist</option>
                            <option value="3">Courier</option>
                        </select>
                    </div>
                    @if ($user->image)
                        <div>
                            <p>Available image</p>
                            <img src="/public/uploads/{{ $user->image }}" alt="" height="100" width="150">
                        </div>
                    @endif
                    <div class="mb-3">
                        <p>User profile image</p>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="image">
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
        </form>
    </div>

@endsection
