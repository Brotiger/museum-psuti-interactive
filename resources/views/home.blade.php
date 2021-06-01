@extends('layouts.main')
@section('title', 'Главная')
@section('content')
    <div class="container-fluid menu">
        <div class="row">
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">КЭИС ПИИРС ПГАТИ ПГУТИ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">КС ПГУТИ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Филиалы</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">СРТТЦ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Ректоры</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Проректоры,<br>Деканы</a>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <a class="btn" href="{{ route('employees_list',['name' => 'pguty']) }}">Сотрудники<br>(ПГУТИ)</a>
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
                <a class="btn" href="{{ route('no_information') }}">Научная деятельность</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('no_information') }}">Материально техническая база</a>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <a class="btn min" href="{{ route('no_information') }}">Подразделения (ПГУТИ)</a>
            </div>
            <div class="col s3">
                <a class="btn min" href="{{ route('no_information') }}">Подразделения (КС ПГУТИ)</a>
            </div>
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