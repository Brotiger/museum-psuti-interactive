@extends('layouts.main')
@section('title')
Выпускник - {{ (!empty($graduate)? $graduate->lastName : '') . " " . (!empty($graduate)? $graduate->firstName : '')}}
@endsection
@section('content')
    <div class="container-fluid mt-4 info-page">
            <div class="my-4">
                <div class="row mb-3">
                    <div class="col-sm-4 left-info">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="block-container">
                                    <img src="/images/no-profile.png" class="personal-photo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 right-info">
                        <div class="block-container">
                            <div class="mb-4">
                            <h1>{{ $graduate->lastName . ' ' . $graduate->firstName . ' ' .$graduate->secondName }}</h1>
                            @if($graduate->dateBirthday)
                                <div class="form-group my-3 row">
                                    <label for="dateBirthday" class="col-6 col-form-label">Дата рождения</label>
                                    <div class="col-sm-6">
                                        <input disabled class="form-control" type="date" id="dateBirthday" value="{{ $graduate->dateBirthday }}">
                                    </div>
                                </div>
                            @endif
                            @if($graduate->enteredYear)
                                <div class="form-group my-3 row">
                                    <label for="enteredYear" class="col-6 col-form-label">Год поступления</label>
                                    <div class="col-sm-6">
                                        <input disabled class="form-control" type="number" id="enteredYear" value="{{ $graduate->enteredYear }}">
                                    </div>
                                </div>
                            @endif
                            @if($graduate->exitYear)
                                <div class="form-group my-3 row">
                                    <label for="exitYear" class="col-6 col-form-label">Год окончания</label>
                                    <div class="col-sm-6">
                                        <input disabled class="form-control" type="number" id="exitYear" value="{{ $graduate->exitYear }}">
                                    </div>
                                </div>
                            @endif
                            @if($graduate->citizenship)
                                <div class="form-group my-3 row">
                                    <label for="citizenship" class="col-6 col-form-label">Гражданство</label>
                                    <div class="col-sm-6">
                                        <input disabled class="form-control" type="text" id="citizenship" value="{{ $graduate->citizenship }}">
                                    </div>
                                </div>
                            @endif
                            @if($graduate->sex)
                                <div class="form-group my-3 row">
                                    <label for="sex" class="col-6 col-form-label">Пол</label>
                                    <div class="col-sm-6">
                                        <input disabled class="form-control" type="text" id="sex" value="{{ $graduate->sex }}">
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                            <div class="block-container block-info user-photo-block">
                                <h2>Информация о образовании</h2>
                                @if($graduate->specialtyName)
                                    Наименование специальности, направления подготовки: <span class="text-lowercase d-inline">{{ $graduate->specialtyName }}</span>.
                                @endif
                                @if($graduate->specialtyCode)
                                    Код специальности, направления подготовки: <span class="text-lowercase d-inline">{{ $graduate->specialtyCode }}</span>.
                                @endif
                                @if($graduate->qualificationName)
                                    Квалификация: <span class="text-lowercase d-inline">{{ $graduate->qualificationName }}</span>.
                                @endif
                                @if($graduate->educationLevel)
                                    Уровень образования: <span class="text-lowercase d-inline">{{ $graduate->educationLevel }}</span>.
                                @endif
                                @if($graduate->educationForm)
                                    Форма обучения: <span class="text-lowercase d-inline">{{ $graduate->educationForm }}</span>.
                                @endif
                                @if($graduate->trainingPeriod)
                                    Срок обучения: <span class="text-lowercase d-inline">{{ $graduate->trainingPeriod }}</span> лет.
                                @endif
                                @if($graduate->documentType)
                                    Вид документа: <span class="text-lowercase d-inline">{{ $graduate->documentType }}</span>.
                                @endif
                                @if($graduate->documentName)
                                    Наименование документа: <span class="text-lowercase d-inline">{{ $graduate->documentName }}</span>.
                                @endif
                                @if($graduate->documentStatus)
                                    Статус документа: <span class="text-lowercase d-inline">{{ $graduate->documentStatus }}</span>.
                                @endif
                                @if($graduate->issueDate)
                                    Дата выдачи: <span class="text-lowercase d-inline">{{ $graduate->issueDate }}</span>.
                                @endif
                                @if($graduate->registrationNumber)
                                    Регистрационный номер: <span class="text-lowercase d-inline">{{ $graduate->registrationNumber }}</span>.
                                @endif
                                @if($graduate->number)
                                    Номер документа: <span class="text-lowercase d-inline">{{ $graduate->number }}</span>.
                                @endif
                                @if($graduate->series)
                                    Серия документа: <span class="text-upercase d-inline">{{ $graduate->series }}</span>.
                                @endif
                                @if($graduate->first)
                                    Высшее образование получалось впервые.
                                @endif
                            </div>
                    </div>
                </div>
            </div>
    </div>
    @endsection