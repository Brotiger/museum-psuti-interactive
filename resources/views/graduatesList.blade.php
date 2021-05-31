@extends('layouts.main')
@section('title')
    Список выпускников {{ $name }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="mt-5 dbList">
            <div class="mb-1 text-center">
                <h1>Список выпускников {{ $name }}</h1>
                <span>Для того что бы просмотреть подробную информацию о выпискнике нажмите на него</span>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th colspan="4">Год окончания {{ $name }}</th>
                    </tr>
                    <tr>
                        <form method="GET">
                            <th><input filter-field type="text" class="form-control" placeholder="Фамилия" name="lastName" autocomplete="off" value="{{ request()->input('lastName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Имя" name="firstName" autocomplete="off" value="{{ request()->input('firstName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Отчество" name="secondName" autocomplete="off" value="{{ request()->input('secondName') }}"></th>
                            <th><input filter-field type="number" class="form-control" placeholder="С:" name="exitYearFrom" value="{{ request()->input('exitYearFrom') }}"></th><th><input type="number" class="form-control" placeholder="По:" filter-field name="exitYearTo" value="{{ request()->input('exitYearTo') }}"></th>
                            <th><button class="form-control btn btn-danger" type="reset" id="resetButton"><i class="bi bi-arrow-counterclockwise"></i></button></th><th><button class="form-control btn btn-primary" id="search"><i class="bi bi-search"></i></button></th>
                        </form>
                    </tr>
                </thead>
                @if($graduates->count() > 0)
                <tbody id="graduatesTable">
                    @foreach($graduates as $graduate)
                        <tr class="recordRow" graduate-id="{{ $graduate->id }}">
                            <td>{{ $graduate->lastName }}</td>
                            <td>{{ $graduate->firstName }}</td>
                            <td>{{ $graduate->secondName }}</td>
                            <td colspan="4">{{ !empty($graduate->exitYear)? $graduate->exitYear : '' }}</td>
                        </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            @if($graduates->count() == 0)
            <p class="text-center mt-5">Ничего не найдено</p>
            @endif
        </div>
        {{ $graduates->appends($next_query)->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
@section('custom_js')
<script>
    $(document).ready(function(){
        $('#graduatesTable').delegate('.recordRow', 'click', function(){
            let empId = $(this).attr('graduate-id')
            window.location.href = window.location.href.split('?')[0] + '/more/' + empId;
        });
    $('#resetButton').on('click', function(){
            $("[filter-field]").each(function(){
                $(this).attr("value", '');
            });
        });
    });
</script>
@endsection