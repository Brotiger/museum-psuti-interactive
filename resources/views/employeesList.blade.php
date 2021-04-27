@extends('layouts.main')
@section('title', 'Сотрудники (ПГУТИ)')
@section('content')
    <div class="container-fluid">
        <div class="row tools">
            <div class="col text-center"><a href="javascript:history.go(-1)"><i class="fas fa-user-plus"></i></a></div>
            <div class="col-10 text-center">Список сотрудников {{ $name }}</div>
            <div class="col text-center"><a href="javascript:history.go(+1)"><i class="fas fa-search"></a></i></div>
        </div>
        <div class="dbList">
            @if($employees->count() > 0)
                @foreach($employees as $employee)
                    <div employee-id="{{ $employee->id }}" class="emp">
                        <div>
                            <img src="{{ $employee->img? 'http://127.0.0.1:8000/storage/'. $employee->img : '/images/no-profile.png' }}">
                        </div>
                        <div class="info">
                            <div><b>Фамилия:</b> {{ $employee->lastName }}</div>
                            <div><b>Имя:</b> {{ $employee->firstName }}</div>
                            <div><b>Отчество:</b> {{ $employee->secondName }}</div>
                            <div><b>Дата рождения:</b> {{ !empty($employee->dateBirthday)? date('m-d-Y', strtotime($employee->dateBirthday)) : 'Неизвестно' }}</div>
                            <div><b>Дата приема:</b> {{ !empty($employee->hired)? date('m-d-Y', strtotime($employee->hired)) : 'Неизвестно' }}</div>
                            <div><b>Дата увольнения:</b> {{ !empty($employee->fired)? date('m-d-Y', strtotime($employee->fired)) : 'Неизвестно' }}</div>
                        </div>
                    </div>
                @endforeach
            @else
            <p>
                Ничего не найдено
            </p>
            @endif
        </div>
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