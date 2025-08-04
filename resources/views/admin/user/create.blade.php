@extends('layouts.admin')

@section('header')
    <h1>
        Добавить пользователя
        <small>приятные слова..</small>
    </h1>
@endsection

@section('content')
    <div class="box">
        <form action="{{ route('admin.user.store') }}" method="post">
            @csrf


            <div class="box-header with-border">
                <h3 class="box-title">Добавляем пользователя</h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Имя</label>
                        <input value="{{ old('name') }}" name="name" type="text" class="form-control"
                               id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input value="{{ old('email') }}" name="email" type="email" class="form-control"
                               id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Пароль</label>
                        <input name="password" type="password" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" style="width: 100%;" name="role">
                            <option value="0" selected="selected">Customer</option>
                            <option value="1">Admin</option>
                            <option value="2">Pharmacist</option>
                            <option value="3">Courier</option>
                        </select>
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
