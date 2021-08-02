@extends('layouts.main')
@section('title')
    Список подрахделений {{ $titleName }}
@endsection
@section('content')
    <div class="container-fluid px-0">
        <div class="pt-4 dbList">
            <div class="mb-3 text-center">
                <h1>Список подразделений {{ $titleName }}</h1>
                <span>Для того что бы просмотреть подробную информацию о подразделении нажмите на него</span>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <form method="GET">
                            <th><input filter-field type="text" class="form-control" placeholder="Полное название" name="fullUnitName" autocomplete="off" value="{{ request()->input('fullUnitName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Сокращенное название" name="shortUnitName" autocomplete="off" value="{{ request()->input('shortUnitName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Тип" name="typeUnit" autocomplete="off" value="{{ request()->input('typeUnit') }}"></th>
                            <th><input filter-field type="date" class="form-control" placeholder="С:" name="creationDateFrom" value="{{ request()->input('creationDateFrom') }}"></th><th><input type="date" class="form-control" placeholder="По:" filter-field name="creationDateTo" value="{{ request()->input('creationDateTo') }}"></th>
                            <th width="150"><button class="form-control btn btn-danger" type="reset" id="resetButton"><i class="bi bi-arrow-counterclockwise"></i></button></th><th width="150"><button class="form-control btn btn-primary" id="search"><i class="bi bi-search"></i></button></th>
                        </form>
                    </tr>
                </thead>
                @if($units->count() > 0)
                <tbody id="listTable">
                    @foreach($units as $unit)
                        <tr class="recordRow" record-id="{{ $unit->id }}">
                            <td>{{ $unit->fullUnitName }}</td>
                            <td>{{ $unit->shortUnitName }}</td>
                            <td>{{ $unit->yupeUnit }}</td>
                            <td colspan="4">{{ !empty($unit->creationDate)? date('m-d-Y', strtotime($unit->creationDate)) : '' }}</td>
                        </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            @if($units->count() == 0)
            <p class="text-center mt-5">Ничего не найдено</p>
            <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
            @endif
        </div>
        {{ $units->appends($next_query)->links('vendor.pagination.bootstrap-4-v2') }}
    </div>
@endsection
@section('custom_js')
    @include('components.js.moreRecord')
@endsection