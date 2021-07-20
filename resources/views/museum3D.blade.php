@extends('layouts.main')
@section('title')
    Виртуальная экскурсия (Музей имени Попова)
@endsection
@section('content')
<div class="container-fuild page">
    <div class="row">
        <div class="col-3">
            <div class="block">
                <h1 class="my-0">Музей имени Попова</h1>
            </div>
            <div class="block-info">
            Центральный музей связи имени А. С. Попова — один из старейших научно-технических музеев мира, основанный в 1872 году как Телеграфный музей. Тематически посвящён истории развития различных видов связи, включая почту, телеграф, телефон, радиосвязь, радиовещание, телевидение, космическую связь, современные технологии связи. В музее хранится Государственная коллекция знаков почтовой оплаты, формируемая Федеральным агентством связи.
            </div>
        </div>
        <div class="col-9">
            <div class="block">
                <iframe class="museum3d" src="museum3d.html" width='100%'></iframe>
            </div>
        </div>
    </div>
</div>
@endsection