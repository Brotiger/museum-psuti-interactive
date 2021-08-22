@extends('layouts.main')
@section('title')
    Список сотрудников {{ $titleName }}
@endsection
@section('content')
    <div class="container-fluid px-0">
        <div class="pt-4 dbList">
            <div class="mb-3 text-center">
                <h1>Список {{ $role }} {{ $titleName }} {{ $postfix }}</h1>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <form method="GET">
                        <input filter-field type="hidden" name="hiredFrom" value="{{ request()->input('hiredFrom') }}"><input type="hidden" filter-field name="hiredTo" value="{{ request()->input('hiredTo') }}">
                            <th><input filter-field type="text" class="form-control" placeholder="Фамилия" name="lastName" autocomplete="off" value="{{ request()->input('lastName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Имя" name="firstName" autocomplete="off" value="{{ request()->input('firstName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Отчество" name="secondName" autocomplete="off" value="{{ request()->input('secondName') }}"></th>
                            <th><input type="text" class="form-control" placeholder="Должность" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Подразделение" disabled></th>
                            <th width="150"><button class="form-control btn btn-danger" type="reset" id="resetButton"><i class="bi bi-arrow-counterclockwise"></i></button></th><th width="150"><button class="form-control btn btn-primary" id="search"><i class="bi bi-search"></i></button></th>
                        </form>
                    </tr>
                </thead>
                @if($employees->count() > 0)
                <tbody id="listTable">
                    @foreach($employees as $employee)
                        <tr class="recordRow" record-id="{{ $employee->id }}">
                            <td>{{ $employee->lastName }}</td>
                            <td>{{ $employee->firstName }}</td>
                            <td>{{ $employee->secondName }}</td>
                            <td>{{ count($employee->units)? $employee->units[0]->post : '' }}</td>
                            <td colspan='3'>{{ count($employee->units)? $employee->units[0]->unit->fullUnitName : '' }}</td>
                        </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            @if($employees->count() == 0)
            <p class="text-center mt-5">Ничего не найдено</p>
            <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
            @endif
        </div>
        {{ $employees->appends($next_query)->links('vendor.pagination.bootstrap-4-v2') }}
    </div>
@endsection
@section('custom_js')
    @include('components.js.moreRecord')
@endsection