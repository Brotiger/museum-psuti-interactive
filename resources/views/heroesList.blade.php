@extends('layouts.main')
@section('title')
    Список связистов героев великой отечественной войны
@endsection
@section('content')
    <div class="container-fluid px-0">
        <div class="pt-4 dbList">
            <div class="mb-3 text-center">
                <h1>Список связистов героев великой отечественной войны</h1>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <form method="GET">
                            <th><input filter-field type="text" class="form-control" placeholder="Фамилия" name="lastName" autocomplete="off" value="{{ request()->input('lastName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Имя" name="firstName" autocomplete="off" value="{{ request()->input('firstName') }}"></th>
                            <th><input filter-field type="text" class="form-control" placeholder="Отчество" name="secondName" autocomplete="off" value="{{ request()->input('secondName') }}"></th>
                            <th width="150"><button class="form-control btn btn-danger" type="reset" id="resetButton"><i class="bi bi-arrow-counterclockwise"></i></button></th><th width="150"><button class="form-control btn btn-primary" id="search"><i class="bi bi-search"></i></button></th>
                        </form>
                    </tr>
                </thead>
                @if($heroes->count() > 0)
                <tbody id="listTable">
                    @foreach($heroes as $hero)
                        <tr class="recordRow" record-id="{{ $hero->id }}">
                            <td>{{ $hero->lastName }}</td>
                            <td>{{ $hero->firstName }}</td>
                            <td colspan="3">{{ $hero->secondName }}</td>
                        </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            @if($heroes->count() == 0)
            <p class="text-center mt-5">Ничего не найдено</p>
            <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
            @endif
        </div>
        {{ $heroes->appends($next_query)->links('vendor.pagination.bootstrap-4-v2') }}
    </div>
@endsection
@section('custom_js')
    @include('components.js.moreRecord')
@endsection