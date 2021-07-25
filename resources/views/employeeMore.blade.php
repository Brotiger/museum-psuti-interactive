@extends('layouts.main')
@section('title')
Сотрудник - {{ (!empty($employee)? $employee->lastName : '') . " " . (!empty($employee)? $employee->firstName : '')}}
@endsection
@section('content')
    <div class="container-fuild info-page">
                <div class="row mb-3">
                    <div class="col-4 left-info wow slideInLeft object-non-visible">
                        <div class="row">
                            <div class="col-12">
                                <div class="block-container">
                                    <img {{ $employee->img? 'fullscreen' : '' }} src="{{ $employee->img? $storageServer . $employee->img : '/images/no-profile.png'}}" class="personal-photo">
                                </div>
                                @if(count($employee->titles))
                                    <div class="block-container block-info">
                                        <h2 class="mb-4">Ученые звания</h2>
                                        <ul>
                                        @foreach($employee->titles as $index => $title)
                                            <li class="title">
                                                <i class="fas fa-user-graduate"></i> <span>{{ $title->titleDate }}</span> <span>{{ $title->title }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(count($employee->degrees))
                                    <div class="block-container block-info">
                                        <h2 class="mb-4">Ученые степени</h2>
                                        <ul>
                                        @foreach($employee->degrees as $index => $degree)
                                            <li class="title">
                                                <i class="fas fa-user-edit"></i> <span>{{ $degree->assignmentDate }}</span> <span>{{ $degree->universityDefense }}</span> <span>{{ $degree->degree }}</span> 
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(count($employee->educations))
                                    <div class="block-container block-info">
                                        <h2 class="mb-4">Образование</h2>
                                        <ul>
                                        @foreach($employee->educations as $index => $education)
                                            <li class="title">
                                                <i class="fas fa-pencil-alt"></i> <span>{{ $education->expirationDate }}</span> <span>{{ $education->university }}</span> <span>{{ $education->specialty }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(count($employee->rewards))
                                    <div class="block-container block-info">
                                        <h2 class="mb-4">Награды</h2>
                                        <ul>
                                        @foreach($employee->rewards as $index => $reward)
                                            <li class="title">
                                                <i class="fas fa-star"></i> <span>{{ $reward->rewardDate }}</span> <span>{{ $reward->reward }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(count($employee->attainments))
                                    <div class="block-container block-info">
                                        <h2 class="mb-4">Достижения</h2>
                                        <ul>
                                        @foreach($employee->attainments as $index => $attainment)
                                            <li class="title">
                                                <i class="fas fa-thumbs-up"></i> <span>{{ $attainment->attainmentDate }}</span> <span>{{ $attainment->attainment }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(count($employee->units))
                                    <div class="block-container block-info">
                                        <h2 class="mb-4">Подразделения</h2>
                                        <ul>
                                        @foreach($employee->units as $index => $unit)
                                            <li class="title">
                                                <i class="fas fa-cog"></i> <span>{{ $unit->recruitmentDate }}</span> <a href="{{ '/units/' . $name . '/more/' . $unit->unit_id }}"><span>{{ $unit->unit->fullUnitName }}</span></a> <span>{{ $unit->post }}</span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-8 right-info">
                        <div class="block-container personal-info wow slideInDown object-non-visible">
                            <h1 class="mb-0">{{ $employee->lastName . ' ' . $employee->firstName . ' ' .$employee->secondName }}</h1>
                            @if($employee->dateBirthday || $employee->hired || $employee->fired)
                                <div class="mt-4">
                                @if($employee->dateBirthday)
                                    <div class="form-group row">
                                        <label for="dateBirthday" class="col-6 col-form-label">Дата рождения</label>
                                        <div class="col-6 date">
                                            <span id="dateBirthday">{{ $employee->dateBirthday }}</span>
                                        </div>
                                    </div>
                                @endif
                                @if($employee->hired)
                                    <div class="form-group row">
                                        <label for="hired" class="col-6 col-form-label">Дата приема</label>
                                        <div class="col-6 date">
                                            <span id="hired">{{ $employee->hired }}</span>
                                        </div>
                                    </div>
                                @endif
                                @if($employee->fired)
                                    <div class="form-group row">
                                        <label for="fired" class="col-6 col-form-label">Дата увольнения</label>
                                        <div class="col-6 date">
                                            <span id="fired">{{ $employee->fired }}</span>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            @endif
                            @if($employee->description)
                                <hr class="mb-4">
                                <div class="form-group row">
                                    <div class="col-12 description_block">
                                        {!! $employee->description !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if(count($employee->photos))
                            @foreach($employee->photos as $index => $photo)
                                <div class="block-container block-info photo-block wow slideInRight object-non-visible">
                                    @if($photo->photoName)
                                        <h3 class="mb-4">{{ $photo->photoName }}</h3>
                                    @endif
                                    @if($photo->photoDate)
                                        <hr>
                                        <div class="mb-4">{{ $photo->photoDate }}</div>
                                    @endif
                                    <div class='content'>
                                        <img fullscreen src="{{ $storageServer . $photo->photo }}" class="user-photo">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if(count($employee->videos))
                            @foreach($employee->videos as $index => $video)
                                <div class="block-container block-info video-block wow slideInRight object-non-visible">
                                    @if($video->videoName)
                                        <h3 class="mb-4">{{ $video->videoName }}</h3>
                                    @endif
                                    @if($video->videoDate)
                                        <hr>
                                        <div class="mb-4">{{ $video->videoDate }}</div>
                                    @endif
                                    <div class='content'>
                                        <div class="item" fullscreen-video  videoId="{{ $video->video }}" videoDate="{{ $video->videoDate }}" videoName="{{ $video->videoName }}">
                                            <i class="play-video far fa-play-circle"></i>
                                            <img src="{{ $video->snippet }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
    </div>
    @endsection