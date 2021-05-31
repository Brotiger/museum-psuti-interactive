@extends('layouts.main')
@section('title')
Сотрудник - {{ (!empty($employee)? $employee->lastName : '') . " " . (!empty($employee)? $employee->firstName : '')}}
@endsection
@section('content')
    <div class="container-fluid mt-4 info-page">
            <div class="my-4">
                <div class="row mb-3">
                    <div class="col-sm-4 left-info">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="block-container">
                                    <img src="{{ $employee->img? $storageServer . $employee->img : '/images/no-profile.png'}}" class="personal-photo">
                                </div>
                                @if(count($employee->titles))
                                    <div class="block-container block-info">
                                        <h2 class="mb-3">Ученые звания</h2>
                                        <ul>
                                        @foreach($employee->titles as $index => $title)
                                            <li class="title">
                                                <i class="fas fa-user-graduate"></i> <span>{{ $title->title }}</span> <span>{{ $title->titleDate }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(count($employee->degrees))
                                    <div class="block-container block-info">
                                        <h2 class="mb-3">Ученые степени</h2>
                                        <ul>
                                        @foreach($employee->degrees as $index => $degree)
                                            <li class="title">
                                                <i class="fas fa-user-edit"></i> <span>{{ $degree->degree }}</span> <span>{{ $degree->assignmentDate }}</span> <span>{{ $degree->topic }}</span> <span>{{ $degree->universityDefense }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(count($employee->educations))
                                    <div class="block-container block-info">
                                        <h2 class="mb-3">Образование</h2>
                                        <ul>
                                        @foreach($employee->educations as $index => $education)
                                            <li class="title">
                                                <i class="fas fa-pencil-alt"></i> <span>{{ $education->university }}</span> <span>{{ $education->specialty }}</span> <span>{{ $education->expirationDate }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(count($employee->rewards))
                                    <div class="block-container block-info">
                                        <h2 class="mb-3">Награды</h2>
                                        <ul>
                                        @foreach($employee->rewards as $index => $reward)
                                            <li class="title">
                                                <i class="fas fa-star"></i> <span>{{ $reward->reward }}</span> <span>{{ $reward->rewardDate }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(count($employee->attainments))
                                    <div class="block-container block-info">
                                        <h2 class="mb-3">Достижения</h2>
                                        <ul>
                                        @foreach($employee->attainments as $index => $attainment)
                                            <li class="title">
                                                <i class="fas fa-thumbs-up"></i> <span>{{ $attainment->attainment }}</span> <span>{{ $attainment->attainmentDate }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(count($employee->units))
                                    <div class="block-container block-info">
                                        <h2 class="mb-3">Подразделения</h2>
                                        <ul>
                                        @foreach($employee->units as $index => $unit)
                                            <li class="title">
                                                <i class="fas fa-cog"></i> <span>{{ $unit->unit->fullUnitName }}</span> <span>{{ $unit->post }}</span> <span>{{ $unit->recruitmentDate }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 right-info">
                        <div class="block-container">
                            <div class="mb-4">
                            <h1>{{ $employee->lastName . ' ' . $employee->firstName . ' ' .$employee->secondName }}</h1>
                            @if($employee->dateBirthday)
                                <div class="form-group my-3 row">
                                    <label for="dateBirthday" class="col-6 col-form-label">Дата рождения</label>
                                    <div class="col-sm-6">
                                        <input disabled class="form-control" type="date" id="dateBirthday" value="{{ $employee->dateBirthday }}">
                                    </div>
                                </div>
                            @endif
                            @if($employee->hired)
                                <div class="form-group my-3 row">
                                    <label for="hired" class="col-6 col-form-label">Дата приема</label>
                                    <div class="col-sm-6">
                                        <input disabled class="form-control" type="date" id="hired" value="{{ $employee->hired }}">
                                    </div>
                                </div>
                            @endif
                            @if($employee->fired)
                                <div class="form-group my-3 row">
                                    <label for="fired" class="col-6 col-form-label">Дата увольнения</label>
                                    <div class="col-sm-6">
                                        <input disabled class="form-control" type="date" id="fired" value="{{ $employee->fired }}">
                                    </div>
                                </div>
                            @endif
                            </div>
                            @if($employee->description)
                                <hr class="mb-4">
                                <div class="form-group row">
                                    <div class="col-sm-12 description_block">
                                        {{ $employee->description }}
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if(count($employee->photos))
                            @foreach($employee->photos as $index => $photo)
                                <div class="block-container block-info user-photo-block">
                                    @if($photo->photoName)
                                        <h3 class="mb-3">{{ $photo->photoName }}</h3>
                                    @endif
                                    @if($photo->photoDate)
                                        <span class="mb-3">{{ $photo->photoDate }}</span>
                                    @endif
                                    <div class='content'>
                                        <img src="{{ $storageServer . $photo->photo }}" class="user-photo">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if(count($employee->videos))
                            @foreach($employee->videos as $index => $video)
                                <div class="block-container block-info user-video-block">
                                    @if($video->videoName)
                                        <h3 class="mb-3">{{ $video->videoName }}</h3>
                                    @endif
                                    @if($video->videoDate)
                                        <span class="mb-3">{{ $video->videoDate }}</span>
                                    @endif
                                    <div class='content'>
                                        <video controls="controls" class="user-video">
                                            <source src="{{ $storageServer . $video->video }}">
                                        </video>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
    </div>
    @endsection