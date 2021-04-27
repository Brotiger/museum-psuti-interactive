@extends('layouts.main')
@section('title', 'Главная')
@section('content')
    <div class="container-fluid">
        <div class="mt-5 dbList">
            @if($employees->count() > 0)
            <div class="mb-1 text-center">
                <h1>Список сотрудников {{ $name }}</h1>
                <span>Для того что бы просмотреть подробную информацию о сотруднике нажмите на него</span>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th colspan="4">Дата приема на работу</th>
                    </tr>
                    <tr>
                        <th><input type="text" class="form-control" placeholder="Фамилия" filter-field id="lastName" autocomplete="off"></th>
                        <th><input type="text" class="form-control" placeholder="Имя" filter-field id="firstName" autocomplete="off"></th>
                        <th><input type="text" class="form-control" placeholder="Отчество" filter-field id="secondName" autocomplete="off"></th>
                        <th><input type="date" class="form-control mb-1" placeholder="С:" filter-field id="hiredFrom"></th><th><input type="date" class="form-control" placeholder="По:" filter-field id="hiredTo"></th>
                        <th><button class="form-control btn btn-danger mb-1" id="reset"><i class="bi bi-arrow-counterclockwise"></i></button></th><th><button class="form-control btn btn-primary" id="search"><i class="bi bi-search"></i></button></th>
                    </tr>
                </thead>
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
            </table>
            @else
            <p>
                Ничего не найдено
            </p>
            @endif
        </div>
        {{ $employees->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function(){
            $('#employeesTable').delegate('.recordRow', 'click', function(){
                let empId = $(this).attr('employee-id')
                window.location.href = 'edit_employee' + '/' + empId;
            });

            $('#search').on('click', function(){
                startLoading();
                var formData = {};

                $('[filter-field]').each(function(i, ell){
                    formData[ell.id] = $(this).val();
                });

                let res = $.ajax({
                    url: "{{route('employees_list')}}",
                    type: "GET",
                    processData: true,
                    contentType: false,
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        stopLoading();
                        let positionParameters = location.pathname.indexOf('?');
                        let url = location.pathname.substring(positionParameters, location.pathname.length);
                        let newUrl = url + '?';
                        for(key in formData){
                            if(formData[key]){
                                newUrl += key + "=" + formData[key] + "&";
                            }
                        }
                        newUrl = newUrl.slice(0, -1);
                        //newUrl += "page={{ isset($_GET['page']) ? $_GET['page'] : 1 }}";
                        history.pushState({}, '', newUrl);

                        $('#employeesTable').html(data)
                    },
                    error: function(data){
                        stopLoading();
                        $('#error-message').fadeIn(300).delay(2000).fadeOut(300);
                    }
                });
            });

            $('#reset').on('click', function(){
                $("[filter-field]").each(function(){
                    $(this).val("");
                });
                $('#search').click();
            });
        });
    </script>
@endsection