@extends('layouts.main')
@section('title', 'Главная')
@section('content')
    <div class="container-fluid menu">
        <div class="row">
            <div class="col s3">
                <a class="btn" href="#">ПГУТИ</a>
            </div>
            <div class="col s3">
                <a class="btn">КС ПГУТИ</a>
            </div>
            <div class="col s3">
                <a class="btn">Филиалы</a>
            </div>
            <div class="col s3">
                <a class="btn">СРТТУ</a>
            </div>
            <div class="col s3">
                <a class="btn">Ректора</a>
            </div>
            <div class="col s3">
                <a class="btn">Проректоры,<br>Деканы,<br>Заведующие кафедр</a>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <a class="btn" href="{{ route('employees_list') }}">Сотрудники<br>(ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn">Выпускники<br>(ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn">Сотрудники<br>(КС ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn">Выпускники<br>(КС ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn">Научная деятельность</a>
            </div>
            <div class="col s3">
                <a class="btn">Материально техническая база</a>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <a class="btn">Виртуальная экскурсия (Музей имени Попова)</a>
            </div>
            <div class="col s3">
                <a class="btn">Подвиги связистов (1941-1945)</a>
            </div>
            <div class="col s3">
                <a class="btn">Академия<br>АТИ</a>
            </div>
            <div class="col s3">
                <a class="btn">Ассоциация<br>"Телеинфо"</a>
            </div>
        </div>
    </div>
@endsection