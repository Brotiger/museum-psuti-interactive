@extends('layouts.main')
@section('title')
    Список событий {{ $name }}
@endsection
@section('content')
    <div class="container-fluid px-0">
        <div class="pt-4 dbList">
            <div class="mb-3 text-center">
                <h1>Список событий {{ $name }}</h1>
                <span>Для того что бы просмотреть подробную информацию о событии нажмите на него</span>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <form method="GET">
                            <th><input filter-field type="text" class="form-control" placeholder="Название" name="name" autocomplete="off" value="{{ request()->input('name') }}"></th>
                            <th><input filter-field type="date" class="form-control" placeholder="С:" name="dateFrom" value="{{ request()->input('dateFrom') }}"></th><th><input type="date" class="form-control" placeholder="По:" filter-field name="dateTo" value="{{ request()->input('dateTo') }}"></th>
                            <th width="150"><button class="form-control btn btn-danger" type="reset" id="resetButton"><i class="bi bi-arrow-counterclockwise"></i></button></th><th width="150"><button class="form-control btn btn-primary" id="search"><i class="bi bi-search"></i></button></th>
                        </form>
                    </tr>
                </thead>
                @if($events->count() > 0)
                <tbody id="listTable">
                    @foreach($events as $event)
                        <tr class="recordRow" record-id="{{ $event->id }}">
                            <td>{{ $event->name }}</td>
                            <td colspan="4">{{ !empty($event->date)? date('m-d-Y', strtotime($event->date)) : '' }}</td>
                        </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            @if($events->count() == 0)
            <p class="text-center mt-5">Ничего не найдено</p>
            <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
            @endif
        </div>
        {{ $events->appends($next_query)->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
@section('custom_js')
    @include('components.js.moreRecord')
@endsection