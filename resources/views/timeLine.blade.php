@extends('layouts.main')
@section('title')
    {{ $titleName }}
@endsection
@section('custom_css')
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
@endsection
@section('content')
<div class="container-fuild date-page">
    <div class="mb-3 text-center">
        <h1>{{ $titleName }}</h1>
    </div>
    <hr>
    <div class="year-container">
        <div class="owl-carousel owl-theme" id="year">
            @for($i = 1956; $i <= date('Y'); $i++)
                <div class="item text-center time-line-year {{ $i == 1956 ? 'active' : '' }}" year="{{ $i }}">{{ $i }}</div>
            @endfor
        </div>
    </div>
    <hr>
    <div class="row mt-3">
        <div class="col-4 mt-2">
            <hr>
                <div class="month-container">
                    <div class="owl-carousel owl-theme" id="month-from">
                        @for($i = 1; $i <= 12; $i++)
                            <div class="item text-center time-line-month {{ $i == 1 ? 'active default' : '' }}" month-from="{{ $i }}">{{ $i }}</div>
                        @endfor
                    </div>
                    <div class="disabled-select" style='display: {{ $month ? 'none' : 'flex' }}'>Выбор месяца не доступен</div>
                </div>
            <hr>
            <div class="wow slideInLeft object-non-visible" id="eventMore">
                <div class="block mt-4">
                    <h2 class='text-center'>Прошедшие события</h2>
                </div>
                <div class="block list" id="eventList">
                    @if(count($events))
                        <ul>
                            @foreach($events as $index => $event)
                                <li>{{ $event->name }}</li>
                                @if($index != count($events) - 1)
                                    <hr>
                                @endif
                            @endforeach
                            @if(count($events) >= $maxRecordCount)
                                <li class="mt-0 text-center">. . .</li>
                            @endif
                        </ul>
                    @else
                        <p class="text-center">Ничего не найдено</p>
                        <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-4 mt-2">
            <hr>
            <div class="select-date mt-2 text-center" id="select-date">
                1956-01-01 | 1956-12-31
            </div>
            <hr>
            <div class="wow bounceInUp object-non-visible" id="unitMore">
                <div class="block mt-4">
                    <h2 class='text-center'>Cформированные подразделения</h2>
                </div>
                <div class="block list" id="unitList">
                    @if(count($units))
                        <ul>
                            @foreach($units as $index => $unit)
                                <li>{{ $unit->fullUnitName }} {{ $unit->shortUnitName ? '('. $unit->shortUnitName .')' : '' }}</li>
                                @if($index != count($units) - 1)
                                    <hr>
                                @endif
                            @endforeach
                            @if(count($units) >= $maxRecordCount)
                                <li class="mt-0 text-center">. . .</li>
                            @endif
                        </ul>
                    @else
                        <p class="text-center">Ничего не найдено</p>
                        <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-4 mt-2">
                <hr>
                    <div class="month-container">
                        <div class="owl-carousel owl-theme" id="month-to">
                            @for($i = 1; $i <= 12; $i++)
                                <div class="item text-center time-line-month {{ $i == 12 ? 'active default' : '' }}" month-to="{{ $i }}">{{ $i }}</div>
                            @endfor
                        </div>
                        <div class="disabled-select" style='display: {{ $month ? 'none' : 'flex' }}'>Выбор месяца не доступен</div>
                    </div>
                <hr>
                <div class="wow slideInRight object-non-visible" id="employeeMore">
                    <div class="block mt-4">
                        <h2 class='text-center'>Пришедшие сотрудники</h2>
                    </div>
                    <div class="block list center" id="employeeList">
                        @if(count($employees))
                            <ul>
                                @foreach($employees as $index => $employee)
                                    <li>{{ $employee->lastName }} {{ $employee->firstName }} {{ $employee->secondName }}</li>
                                    @if($index != count($employees) - 1)
                                        <hr>
                                    @endif
                                @endforeach
                                @if(count($employees) >= $maxRecordCount)
                                    <li class="mt-0 text-center">. . .</li>
                                @endif
                            </ul>
                        @else
                            <p class="text-center">Ничего не найдено</p>
                            <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
@section('custom_js')
<script src="/js/owl.carousel.min.js"></script>
    <script>
        var changeYear = true;
        var changeMonthFrom = true;
        var changeMonthTo = true;

        var year = '1956';

        var monthFrom = '01';
        var monthTo = '12';

        var dateFrom = year + '-' + monthFrom + '-01';
        var dateTo = year + '-' + monthTo + '-' + daysInMonth(monthTo, year);

        var monthFromOwl = $('#month-from').owlCarousel({
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

        var monthToOwl = $('#month-to').owlCarousel({
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

        $('#year').delegate('[year]', 'click', function(){
            if(changeYear){
                $('[year]').each(function(){
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
                year = $(this).attr('year');

                monthFromOwl.trigger('to.owl.carousel', 0);
                monthToOwl.trigger('to.owl.carousel', 12 - 8);

                $('[month-to]').each(function(){
                    $(this).removeClass('active');
                })

                $('[month-from]').each(function(){
                    $(this).removeClass('active');
                })

                $('#month-to .default').addClass('active');
                $('#month-from .default').addClass('active');

                monthTo = 12;
                monthFrom = 1;

                search();
            }
        });

        $('#month-from').delegate('[month-from]', 'click', function(){
            if(changeMonthFrom){
                $('[month-from]').each(function(){
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
                monthFrom = $(this).attr('month-from');
                search();
            }
        });

        $('#month-to').delegate('[month-to]', 'click', function(){
            if(changeMonthTo){
                $('[month-to]').each(function(){
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
                monthTo = $(this).attr('month-to');
                search();
            }
        });

        var yearItems = 14;

        $('#year').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            items: yearItems
        }).on('drag.owl.carousel', function(){
            changeYear = false;
        }).on('dragged.owl.carousel', function(){
            setTimeout(() => {
                changeYear = true;
            }, 1);
        });

        $('.date-page').delegate("#employeeMore"," click", function(){
            if($(this).find('ul li').length > 0){ 
                if(dateFrom <= dateTo){
                    window.location.href = "/employees/{{ $site }}?hiredFrom=" + dateFrom + "&hiredTo=" + dateTo;
                }else{
                    window.location.href = "/employees/{{ $site }}?hiredFrom=" + dateTo + "&hiredTo=" + dateFrom;
                }
            }
        });

        $('.date-page').delegate("#unitMore"," click", function(){
            if($(this).find('ul li').length > 0){
                if(dateFrom <= dateTo){
                    window.location.href = "/units/{{ $site }}?creationDateFrom=" + dateFrom + "&creationDateTo=" + dateTo;
                }else{
                    window.location.href = "/units/{{ $site }}?creationDateFrom=" + dateTo + "&creationDateTo=" + dateFrom;
                }
            }
        });

        $('.date-page').delegate("#eventMore"," click", function(){
            if($(this).find('ul li').length > 0){ 
                if(dateFrom <= dateTo){
                    window.location.href = "/events/{{ $site }}?dateFrom=" + dateFrom + "&dateTo=" + dateTo;
                }else{
                    window.location.href = "/events/{{ $site }}?dateFrom=" + dateTo + "&dateTo=" + dateFrom;
                }
            }
        });

        function search(){
            monthFrom = String(monthFrom);
            monthTo = String(monthTo);

            if(monthFrom.length == 1){
                monthFrom = "0" + monthFrom;
            }

            if(monthTo.length == 1){
                monthTo = "0" + monthTo;
            }
            
            dateFrom = year + '-' + monthFrom + '-01';
            dateTo = year + '-' + monthTo + '-' + daysInMonth(monthTo, year);

            if(dateFrom <= dateTo){
                $("#select-date").text(dateFrom + " | " + dateTo);
            }else{
                $("#select-date").text(dateTo + " | " + dateFrom);
            }

            let res = $.ajax({
                type: "GET",
                cache: false,
                processData: true, //преобразовывать передаваемые данные в строку
                data: {
                    'dateFrom': dateFrom,
                    'dateTo': dateTo,
                    'year': year
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    if(data.month){
                        $('.month-container .disabled-select').hide();
                    }else{
                        $('.month-container .disabled-select').show();
                    }
                    
                    $('#employeeList').html(data.employees);
                    $('#eventList').html(data.events);
                    $('#unitList').html(data.units);
                }
            });
        }

        function daysInMonth(month,year) {
            monthNum =  new Date(Date.parse(month +" 1,"+year)).getMonth()+1
            return new Date(year, monthNum, 0).getDate();
        }
    </script>
@endsection