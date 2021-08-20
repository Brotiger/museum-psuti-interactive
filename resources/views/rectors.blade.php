@extends('layouts.main')
@section('title')
    Ректоры
@endsection
@section('content')
<div class="container-fuild rectors-page wow fadeIn object-non-visible">
    <div class="row">
        <div class="col">
            <div class="card-block" onclick="document.location='{{ route('employee_more', ['name' => 'pguty', 'id' => 843]) }}'">
                <div>
                    <img src="/images/rectors/1r.jpg">
                </div>
                <div class="name">
                    <h2 class="mb-0">Полтавцев Всеволод<br>Фёдорович</h2>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card-block" onclick="document.location='{{ route('employee_more', ['name' => 'pguty', 'id' => 248]) }}'">
                <div>
                    <img src="/images/rectors/2r.jpg">
                </div>
                <div class="name">
                    <h2 class="mb-0">Слугинов Сергей<br>Леонидович</h2>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card-block" onclick="document.location='{{ route('employee_more', ['name' => 'pguty', 'id' => 215]) }}'">
                <div>
                    <img src="/images/rectors/3r.jpg">
                </div>
                <div class="name">
                    <h2 class="mb-0">Морозов Виталий<br>Константинович</h2>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card-block" onclick="document.location='{{ route('employee_more', ['name' => 'pguty', 'id' => 569]) }}'">
                <div>
                    <img src="/images/rectors/4r.jpg">
                </div>
                <div class="name">
                    <h2 class="mb-0">Витевский Владимир<br>Борисович</h2>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card-block" onclick="document.location='{{ route('employee_more', ['name' => 'pguty', 'id' => 835]) }}'">
                <div>
                    <img src="/images/rectors/5r.jpg">
                </div>
                <div class="name">
                    <h2 class="mb-0">Андреев Владимир<br>Александрович</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card-block" onclick="document.location='{{ route('employee_more', ['name' => 'pguty', 'id' => 937]) }}'">
                <div>
                    <img src="/images/rectors/6r.jpg">
                </div>
                <div class="name">
                    <h2 class="mb-0">Мишин Дмитрий<br>Викторович</h2>
                </div>
            </div>
        </div>
        <div class="col">
            
        </div>
        <div class="col">
            
        </div>
        <div class="col">
            
        </div>
        <div class="col">
            
        </div>
    </div>
</div>
@endsection