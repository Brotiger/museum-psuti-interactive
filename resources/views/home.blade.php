@extends('layouts.main')
@section('title', 'Главная')
@section('content')
<div class="menuContainer">
    <div class="container-fluid menu">
        <div class="row row-1">
            <div class="col s3">
                <a class="btn" href="{{ route('time_line', ['name' => 'pguty']) }}">КЭИС ПИИРС<br>ПГАТИ ПГУТИ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('time_line', ['name' => 'ks']) }}">КС ПГУТИ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['id' => 1]) }}">Филиалы</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['id' => 2]) }}">СРТТЦ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Ректоры</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['id' => 3]) }}">Проректоры,<br>деканы,<br>зав. кафедры</a>
            </div>
        </div>
        <div class="row row-2">
            <div class="col s3">
                <a class="btn" href="{{ route('employees_list', ['name' => 'pguty']) }}">Сотрудники<br>(ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('graduates_list', ['name' => 'pguty']) }}">Выпускники<br>(ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('employees_list',['name' => 'ks']) }}">Сотрудники<br>(КС ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('graduates_list', ['name' => 'ks']) }}">Выпускники<br>(КС ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['id' => 4]) }}">Научная деятельность</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['id' => 5]) }}">Материально техническая база</a>
            </div>
        </div>
        <div class="row row-3">
            <div class="col s3">
                <a class="btn min" href="{{ route('units_list',['name' => 'pguty']) }}">Подразделения (ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn min" href="{{ route('units_list',['name' => 'ks']) }}">Подразделения (КС ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('museum_3d') }}">Виртуальная экскурсия (Музей имени Попова)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Подвиги связистов (1941-1945)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['id' => 6]) }}">Академия<br>АТИ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['id' => 7]) }}">Ассоциация<br>"Телеинфо"</a>
            </div>
        </div>
    </div>
<div>
@endsection