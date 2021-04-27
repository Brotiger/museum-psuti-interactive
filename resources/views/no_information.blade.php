@extends('layouts.main')
@section('title', 'Страница в разработке')
<style>
    .gear{
        font-size: 5vw;
        animation: rotate 5s linear infinite;
        color: #7799dd;
    }
    @keyframes rotate {
        from {
            transform: rotate(360deg);
        }
    }
</style>
@section('content')
<div class="container text-center mt-5">
    <p>Приносим свои извенения, контент для данной страницы находится в разработке и будет доступен в ближайшее время.</p>
    <a class="btn mt-2 mb-5" href="/">Вернуться на главную</a>
    <div class="gear"><i class="bi bi-gear-wide-connected"></i></div>
</div>
@endsection()