@extends('layouts.main')
@section('title', 'Главная')
@section('content')
<div class="PDZK" id="WindowPDZK" style="display: none">
    <button class="close-PDZK" id="close-PDZK"><i class="fas fa-times"></i></button>
    <div class="row buttons">
        <div class="col">
            <a class="btn" href="{{ route('employees_list', ['name' => 'pguty', 'post' => 'Проректор']) }}" style="display: none">Проректоры</a>
        </div>
        <div class="col">
            <a class="btn" href="{{ route('employees_list', ['name' => 'pguty', 'post' => 'Декан']) }}" style="display: none">Деканы</a>
        </div>
        <div class="col">
            <a class="btn" href="{{ route('employees_list', ['name' => 'pguty', 'post' => 'Заведующий кафедры']) }}" style="display: none">Зав. кафедры</a>
        </div>
    </div>
</div>
<div class="menuContainer">
    <div class="container-fluid menu wow fadeIn object-non-visible">
        <div class="row row-1">
            <div class="col s3">
                <a class="btn" href="{{ route('time_line', ['name' => 'pguty']) }}">КЭИС ПИИРС<br>ПГАТИ ПГУТИ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('time_line', ['name' => 'ks']) }}">КС ПГУТИ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['alias' => 'branches']) }}">Филиалы</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['alias' => 'SRTTTS']) }}">СРТТЦ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('rectors') }}">Ректоры</a>
            </div>
            <div class="col s3">
                <a class="btn" href="#" id="PDZK">Проректоры,<br>деканы,<br>зав. кафедры</a>
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
                <a class="btn" href="{{ route('page', ['alias' => 'ScientificActivity']) }}">Научная деятельность</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['alias' => 'MaterialAndTechnicalBase']) }}">Материально техническая база</a>
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
                <a class="btn" href="{{ route('employees_list', ['name' => 'pguty', 'post' => 'Участник ВОВ']) }}">Подвиги связистов (1941-1945)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['alias' => 'ATIAcademy']) }}">Академия<br>АТИ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['alias' => 'Teleinfo']) }}">Ассоциация<br>"Телеинфо"</a>
            </div>
        </div>
    </div>
<div>
@endsection
@section('custom_js')
    <script>
        $("#PDZK").click(function(){
            $(".cover, #WindowPDZK").show(0, function(){
                $('#WindowPDZK .btn').fadeIn(400);
            });
            $('body').css('overflow', 'hide');     
        });

        $("#close-PDZK").click(function(){
            $("#WindowPDZK, .cover, #WindowPDZK .btn").hide();
            $('body').css('overflow', 'auto');
        });
    </script>
@endsection