@extends('layouts.pharmacy')

@section('header')
    <h1>
        Привет! Это админка
        <small>приятные слова..</small>
    </h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Главная страница</h3>
        </div>
        <div class="box-body">
            Текст инструкции по пользованию админкой
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            и здесь есть место для какого-нибудь текста
        </div>
    </div>
@endsection
