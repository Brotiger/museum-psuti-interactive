@extends('layouts.main')
@section('title', 'Главная')
@section('content')
    <div class="container-fluid menu">
        <div class="row">
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">ПГУТИ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">КС ПГУТИ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Филиалы</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">СРТТУ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Ректора</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Проректоры,<br>Деканы,<br>Заведующие кафедр</a>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <a class="btn" href="{{ route('employees_list') }}">Сотрудники<br>(ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Выпускники<br>(ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Сотрудники<br>(КС ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Выпускники<br>(КС ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Научная деятельность</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Материально техническая база</a>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Виртуальная экскурсия (Музей имени Попова)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Подвиги связистов (1941-1945)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Академия<br>АТИ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Ассоциация<br>"Телеинфо"</a>
            </div>
        </div>
    </div>
@endsection