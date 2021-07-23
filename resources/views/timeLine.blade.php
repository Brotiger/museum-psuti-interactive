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
    <div class="row mt-3">
        <div class="col-4 mt-2">
            <hr>
            <div class="owl-carousel owl-theme" id="month-from">
                @for($i = 1; $i <= 12; $i++)
                    <div class="item text-center time-line-month {{ $i == 1 ? 'active' : '' }}" month-from="{{ $i }}">{{ $i }}</div>
                @endfor
            </div>
            <hr>
            <div class="wow slideInLeft object-non-visible">
                <div class="block mt-4">
                    <h2 class='text-center'>Cформированные подразделения</h2>
                </div>
                <div class="block list" id="unitList">
                    @if(count($units))
                        <ul>
                            @foreach($units as $unit)
                                <li>{{ $unit->fullUnitName }} {{ $unit->shortUnitName ? '('. $unit->shortUnitName .')' : '' }}</li>
                                <hr>
                            @endforeach
                            @if(count($units) >= 7)
                                <li class="text-center">. . .</li>
                            @endif
                        </ul>
                    <input type="button" value="Подробнее" id="unitMore">
                    @else
                        <p class="text-center">Ничего не найдено</p>
                        <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-4 mt-2">
            <div>
                <hr>
                <div class="select-date mt-2 text-center" id="select-date">
                    1957-01-01 | {{ date("Y-m") . "-" . cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) }}
                </div>
                <hr>
                <div class="wow bounceInUp object-non-visible">
                    <div class="block mt-4">
                        <h2 class='text-center'>Пришедшие сотрудники</h2>
                    </div>
                    <div class="block list center" id="employeeList">
                        @if(count($employees))
                            <ul>
                                @foreach($employees as $employee)
                                    <li>{{ $employee->lastName }} {{ $employee->firstName }} {{ $employee->secondName }}</li>
                                    <hr>
                                @endforeach
                                @if(count($employees) >= 7)
                                    <li class="text-center">. . .</li>
                                @endif
                            </ul>
                        <input type="button" value="Подробнее" id="employeeMore">
                        @else
                            <p class="text-center">Ничего не найдено</p>
                            <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 mt-2">
            <hr>
            <div class="owl-carousel owl-theme" id="month-to">
                @for($i = 1; $i <= 12; $i++)
                    <div class="item text-center time-line-month {{ $i == 12 ? 'active' : '' }}" month-to="{{ $i }}">{{ $i }}</div>
                @endfor
            </div>
            <hr>
            <div class="wow slideInRight object-non-visible">
                <div class="block mt-4">
                    <h2 class='text-center'>Прошедшие события</h2>
                </div>
                <div class="block list" id="eventList">
                    @if(count($events))
                        <ul>
                            @foreach($events as $event)
                                <li>{{ $event->name }}</li>
                                <hr>
                            @endforeach
                            @if(count($events) >= 7)
                                <li class="text-center">. . .</li>
                            @endif
                        </ul>
                    <input type="button" value="Подробнее" id="eventMore">
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
        var changeYearFrom = true;
        var changeYearTo = true;
        var changeMonthFrom = true;
        var changeMonthTo = true;

        var yearFrom = '1957';
        var yearTo = String(@php echo date('Y') @endphp);

        var monthFrom = '01';
        var monthTo = String(@php echo date('m') @endphp);

        var dateFrom = yearFrom + '-' + monthFrom + '-01';
        var dateTo = yearTo + '-' + monthTo + '-' + daysInMonth(monthTo, yearTo);

        $('#year-from').delegate('[year-from]', 'click', function(){
            if(changeYearFrom){
                $('[year-from]').each(function(){
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
                yearFrom = $(this).attr('year-from');
                search();
            }
        });

        $('#year-to').delegate('[year-to]', 'click', function(){
            if(changeYearTo){
                $('[year-to]').each(function(){
                    $(this).removeClass('active');
                });
                $(this).addClass('active');
                yearTo = $(this).attr('year-to');
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

        $('.date-page').delegate("#employeeMore"," click", function(){
            if(dateFrom <= dateTo){
                window.location.href = "/employees/{{ $site }}?hiredFrom=" + dateFrom + "&hiredTo=" + dateTo;
            }else{
                window.location.href = "/employees/{{ $site }}?hiredFrom=" + dateTo + "&hiredTo=" + dateFrom;
            }
        });

        $('.date-page').delegate("#unitMore"," click", function(){
            if(dateFrom <= dateTo){
                window.location.href = "/units/{{ $site }}?creationDateFrom=" + dateFrom + "&creationDateTo=" + dateTo;
            }else{
                window.location.href = "/units/{{ $site }}?creationDateFrom=" + dateTo + "&creationDateTo=" + dateFrom;
            }
        });

        $('.date-page').delegate("#eventMore"," click", function(){
            if(dateFrom <= dateTo){
                window.location.href = "/events/{{ $site }}?dateFrom=" + dateFrom + "&dateTo=" + dateTo;
            }else{
                window.location.href = "/events/{{ $site }}?dateFrom=" + dateTo + "&dateTo=" + dateFrom;
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
            
            dateFrom = yearFrom + '-' + monthFrom + '-01';
            dateTo = yearTo + '-' + monthTo + '-' + daysInMonth(monthTo, yearTo);

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
                    'dateTo': dateTo
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
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