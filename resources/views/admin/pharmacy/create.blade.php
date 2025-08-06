@extends('layouts.admin')

@section('header')
    <h1>
        Добавить пользователя
        <small>приятные слова..</small>
    </h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box">
        <form action="{{ route('admin.pharmacy.store') }}" method="post">
            @csrf


            <div class="box-header with-border">
                <h3 class="box-title">Добавляем пользователя</h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input value="{{ old('title') }}" name="title" type="text" class="form-control"
                               id="exampleInputEmail1">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input value="{{ old('address') }}" name="address" type="text" class="form-control"
                               id="exampleInputEmail1">
                        @error('address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Owner</label>
                        <input name="owner" type="text" class="form-control" id="exampleInputEmail1">
                        @error('owner')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <h3 class="title">Location of PHARMACY</h3>

                        <div class="form-group">
                            <label for="lat">Enter latitude </label>
                            <input name="lat" type="number" class="form-control" step="any" value="{{ old('lat') }}">
                        </div>
                        <div class="form-group">
                            <label for="lat">Enter longitude </label>
                            <input name="lng" type="number" class="form-control" step="any" value="{{ old('lng') }}">
                        </div>
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
