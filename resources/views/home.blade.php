@extends('layouts.main')
@section('title', 'Главная')
@section('content')
<div class="modal-btn-container" id="windowPDZK" style="display: none">
    <button class="close-modal" close-modal><i class="fas fa-times"></i></button>
    <div>
        <div>
            <a class="btn" href="{{ route('employees_list', ['name' => 'pguty', 'post' => 'Проректор']) }}" style="display: none">Проректоры</a>
        </div>
        <div>
            <a class="btn" href="{{ route('employees_list', ['name' => 'pguty', 'post' => 'Декан']) }}" style="display: none">Деканы</a>
        </div>
        <div>
            <a class="btn" href="{{ route('employees_list', ['name' => 'pguty', 'post' => 'Заведующий кафедрой']) }}" style="display: none">Зав. кафедрами</a>
        </div>
        <div>
            <a class="btn" href="{{ route('employees_list', ['name' => 'ks', 'post' => 'Деректор']) }}" style="display: none">Директора КС</a>
        </div>
    </div>
</div>
<div class="modal-btn-container" id="windowBranches" style="display: none">
    <button class="close-modal" close-modal><i class="fas fa-times"></i></button>
    <div>
        <div>
            <a class="btn" href="{{ route('page', ['alias' => 'branchOrenburg']) }}" style="display: none">Филиал в<br>Оренбурге</a>
        </div>
        <div>
            <a class="btn" href="{{ route('page', ['alias' => 'branchKazan']) }}" style="display: none">Филиал в<br>Казани</a>
        </div>
        <div>
            <a class="btn" href="{{ route('page', ['alias' => 'branchStavropol']) }}" style="display: none">Филиал в<br>Ставрополе</a>
        </div>
    </div>
</div>
<div class="modal-btn-container" id="windowFeats" style="display: none">
    <button class="close-modal" close-modal><i class="fas fa-times"></i></button>
    <div>
        <div>
            <a class="btn" href="{{ route('employees_list', ['name' => 'pguty', 'post' => 'Участники ВОВ']) }}" style="display: none">Сотрудники ПГУТИ - участники ВОВ</a>
        </div>
        <div>
            <a class="btn" href="{{ route('heroes_list') }}" style="display: none">Связисты поволжья - герои СССР</a>
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
                <a class="btn" href="#" id="branches">Филиалы</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('page', ['alias' => 'SRTTTS']) }}">СРТТЦ</a>
            </div>
            <div class="col s3">
                <a class="btn" href="{{ route('rectors') }}">Ректоры</a>
            </div>
            <div class="col s3">
                <a class="btn" href="#" id="PDZK">Проректоры,<br>деканы,<br>зав. кафедрами,<br>директора КС</a>
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
                <a class="btn" href="{{ route('museum_3d') }}">Виртуальная экскурсия (Музей связи им. А.С. Попова г. Санкт-Петербург)</a>
            </div>
            <div class="col s3">
                <a class="btn" href="#" id="feats">Подвиги связистов (1941-1945)</a>
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
            $(".cover, #windowPDZK").show(0, function(){
                $('#windowPDZK .btn').fadeIn(400);
            });
            $('body').css('overflow', 'hide');     
        });

        $("#branches").click(function(){
            $(".cover, #windowBranches").show(0, function(){
                $('#windowBranches .btn').fadeIn(400);
            });
            $('body').css('overflow', 'hide');     
        });

        $("#feats").click(function(){
            $(".cover, #windowFeats").show(0, function(){
                $('#windowFeats .btn').fadeIn(400);
            });
            $('body').css('overflow', 'hide');     
        });

        $("[close-modal]").click(function(){
            $(this).parent().find('.btn').hide();
            $(this).parent().hide();
            $('.cover').hide();
            $('body').css('overflow', 'auto');
        });
    </script>
@endsection