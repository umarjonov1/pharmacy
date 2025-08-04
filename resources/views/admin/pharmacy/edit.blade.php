@extends('layouts.admin')

@section('header')
    <h1>
        Добавить пользователя
        <small>приятные слова..</small>
    </h1>
@endsection

@section('content')
    <div class="box">
        <form action="{{ route('admin.medicine.update', $pharmacy->id) }}" method="post">
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
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ url()->previous() }}" class="btn btn-default">Назад</a>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
        </form>
    </div>

@endsection
