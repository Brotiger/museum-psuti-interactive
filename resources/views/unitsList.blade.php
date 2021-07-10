@extends('layouts.main')
@section('title')
    Список подрахделений {{ $name }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="pt-4 dbList">
            <div class="mb-3 text-center">
                <h1>Список подразделений {{ $name }}</h1>
                <span>Для того что бы просмотреть подробную информацию о сотруднике нажмите на него</span>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <form method="GET">
                            <th><input filter-field type="text" class="form-control" placeholder="Фамилия" name="lastName" autocomplete="off" value="{{ request()->input('lastName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Имя" name="firstName" autocomplete="off" value="{{ request()->input('firstName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Отчество" name="secondName" autocomplete="off" value="{{ request()->input('secondName') }}"></th>
                            <th><input filter-field type="date" class="form-control" placeholder="С:" name="hiredFrom" value="{{ request()->input('hiredFrom') }}"></th><th><input type="date" class="form-control" placeholder="По:" filter-field name="hiredTo" value="{{ request()->input('hiredTo') }}"></th>
                            <th width="150"><button class="form-control btn btn-danger" type="reset" id="resetButton"><i class="bi bi-arrow-counterclockwise"></i></button></th><th width="150"><button class="form-control btn btn-primary" id="search"><i class="bi bi-search"></i></button></th>
                        </form>
                    </tr>
                </thead>
                @if($employees->count() > 0)
                <tbody id="employeesTable">
                    @foreach($employees as $employee)
                        <tr class="recordRow" employee-id="{{ $employee->id }}">
                            <td>{{ $employee->lastName }}</td>
                            <td>{{ $employee->firstName }}</td>
                            <td>{{ $employee->secondName }}</td>
                            <td colspan="4">{{ !empty($employee->dateBirthday)? date('m-d-Y', strtotime($employee->dateBirthday)) : '' }}</td>
                        </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            @if($employees->count() == 0)
            <p class="text-center mt-5">Ничего не найдено</p>
            @endif
        </div>
        {{ $employees->appends($next_query)->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
@section('custom_js')
<script>
    $(document).ready(function(){
        $('#employeesTable').delegate('.recordRow', 'click', function(){
            let empId = $(this).attr('employee-id')
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