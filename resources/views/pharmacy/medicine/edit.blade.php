@extends('layouts.pharmacy')

@section('header')
    <h1>
        Editing <b>medicine</b>
        <small>приятные слова..</small>
    </h1>
@endsection

@section('content')
    <div class="box">
        <form action="{{ route('pharmacy.medicine.update', $medicine->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')


            <div class="box-header with-border">
                <h3 class="box-title">Добавляем пользователя</h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input value="{{ $medicine->title }}" name="title" type="text" class="form-control"
                               id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input value="{{ $medicine->description ?? old('description') }}" name="description" type="text" class="form-control"
                               id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input value="{{ $medicine->price ?? old('price') }}" name="price" type="number" class="form-control"
                               id="exampleInputEmail1">
                    </div>
                    @if ($medicine->image)
                        <div>
                            <p>Available image</p>
                            <img src="/public/uploads/{{ $medicine->image }}" alt="" height="100" width="150">
                        </div>
                    @endif
                    <div class="mb-3">
                        <p>Medicine image</p>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="image">
                    </div>

                    <div class="form-group">
                        <label>Pharmacy</label>
                        <select class="form-control" style="width: 100%;" name="pharmacy_id">
                            @foreach($pharmacies as $pharmacy)
                                <option value="{{ $pharmacy->id }}"
                                    {{ (old('pharmacy_id') == $pharmacy->id || (isset($medicine) && $medicine->pharmacy_id == $pharmacy->id)) ? 'selected' : '' }}>
                                    {{ $pharmacy->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" style="width: 100%;" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                {{ (old('category_id') == $category->id  || (isset($medicine) && $medicine->category_id == $category->id)) ? 'selected' : ''}}>
                                    {{ $category->title }}</option>
                            @endforeach
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
