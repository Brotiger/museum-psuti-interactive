@extends('layouts.main')
@section('title', 'ПГУТИ')
@section('custom_css')
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
@endsection
@section('content')
<div class="info-page">
    <div class="mb-3 text-center">
        <h1>КЭИС ПИИРС ПГАТИ ПГУТИ</h1>
        <span>Для просмотра информации выбирите диапазон дат</span>
    </div>
    <hr>
    <div class="owl-carousel owl-theme" id="year-from">
        @for($i = 1957; $i <= date('Y'); $i++)
            <div class="item text-center time-line-year {{ $i == 1957 ? 'active' : '' }}" year-from="{{ $i }}">{{ $i }}</div>
        @endfor
    </div>
    <hr>
    <div class="owl-carousel owl-theme" id="year-to">
        @for($i = 1957; $i <= date('Y'); $i++)
            <div class="item text-center time-line-year {{ $i == date('Y') ? 'active' : '' }}" year-to="{{ $i }}">{{ $i }}</div>
        @endfor
    </div>
    <hr>
    <div class="row">
        <div class="col-4">
            <div class="owl-carousel owl-theme" id="month-from">
                @for($i = 1; $i <= 12; $i++)
                    <div class="item text-center time-line-month {{ $i == 1 ? 'active' : '' }}" month-from="{{ $i }}">{{ $i }}</div>
                @endfor
            </div>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <div class="owl-carousel owl-theme" id="month-to">
                @for($i = 1; $i <= 12; $i++)
                    <div class="item text-center time-line-month {{ $i == 12 ? 'active' : '' }}" month-to="{{ $i }}">{{ $i }}</div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_js')
    <script src="/js/owl.carousel.min.js"></script>
    <script>
        var changeYearFrom = true;
        var changeYearTo = true;
        var changeMonthFrom = true;
        var changeMonthTo = true;

        $('#year-from').delegate('[year-from]', 'click', function(){
            if(changeYearFrom){
                $('[year-from]').each(function(){
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
            }
        });

        $('#year-to').delegate('[year-to]', 'click', function(){
            if(changeYearTo){
                $('[year-to]').each(function(){
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
            }
        });

        $('#month-from').delegate('[month-from]', 'click', function(){
            if(changeMonthFrom){
                $('[month-from]').each(function(){
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
            }
        });

        $('#month-to').delegate('[month-to]', 'click', function(){
            if(changeMonthTo){
                $('[month-to]').each(function(){
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
            }
        });

        var yearItems = 14;

        $('#year-from').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            items: yearItems
        }).on('drag.owl.carousel', function(){
            changeYearFrom = false;
        }).on('dragged.owl.carousel', function(){
            setTimeout(() => {
                changeYearFrom = true;
            }, 1);
        });

        $('#year-to').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            items: yearItems,
            startPosition: {{ date('Y') - 1957 + 1 }} - yearItems,
        }).on('drag.owl.carousel', function(){
            changeYearTo = false;
        }).on('dragged.owl.carousel', function(){
            setTimeout(() => {
                changeYearTo = true;
            }, 1);
        });

        $('#month-from').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            items: 8,
        }).on('drag.owl.carousel', function(){
            changeMonthFrom = false;
        }).on('dragged.owl.carousel', function(){
            setTimeout(() => {
                changeMonthFrom = true;
            }, 1);
        });

        $('#month-to').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            items: 8,
            startPosition: 12 - 8
        }).on('drag.owl.carousel', function(){
            changeMonthTo = false;
        }).on('dragged.owl.carousel', function(){
            setTimeout(() => {
                changeMonthTo = true;
            }, 1);
        });
    </script>
@endsection