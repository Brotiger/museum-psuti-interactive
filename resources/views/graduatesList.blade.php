@extends('layouts.main')
@section('title')
    Список выпускников {{ $name }}
@endsection
@section('content')
    <div class="container-fluid px-0">
        <div class="pt-4 dbList">
            <div class="mb-4 text-center">
                <h1>Список выпускников {{ $name }}</h1>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <form method="GET">
                            <th><input filter-field type="text" class="form-control" placeholder="Фамилия" name="lastName" autocomplete="off" value="{{ request()->input('lastName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Имя" name="firstName" autocomplete="off" value="{{ request()->input('firstName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Отчество" name="secondName" autocomplete="off" value="{{ request()->input('secondName') }}"></th>
                            <th><input type="number" class="form-control" placeholder="Год окончания" filter-field name="exitYear" value="{{ request()->input('exitYear') }}"></th>
                            <th><input type="text" class="form-control" placeholder="Специальность" disabled></th>
                            <th width="150"><button class="form-control btn btn-danger" type="reset" id="resetButton"><i class="bi bi-arrow-counterclockwise"></i></button></th><th width="150"><button class="form-control btn btn-primary" id="search"><i class="bi bi-search"></i></button></th>
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
                            <td>{{ !empty($graduate->exitYear)? $graduate->exitYear : '' }}</td>
                            <td colspan="3">{{ $graduate->specialtyName }}</td>
                        </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            @if($graduates->count() == 0)
            <p class="text-center mt-5">Ничего не найдено</p>
            <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
            @endif
        </div>
        {{ $graduates->appends($next_query)->links('vendor.pagination.bootstrap-4-v2') }}
    </div>
@endsection