@extends('layouts.main')
@section('title')
Герой ВОВ - {{ (!empty($employee)? $employee->lastName : '') . " " . (!empty($employee)? $employee->firstName : '')}}
@endsection
@section('content')
    <div class="container-fuild info-page employee">
                <div class="row mb-3">
                    <div class="col-4 left-info wow slideInLeft object-non-visible">
                        <div class="row">
                            <div class="col-12">
                                <div class="block-container main-photo">
                                    <img {{ $hero->img? 'fullscreen' : '' }} src="{{ $hero->img? $storageServer . $hero->img : '/images/no-profile.png'}}" class="personal-photo">
                                </div>
                                @if(count($hero->rewards))
                                    <div class="block-container block-info">
                                        <h2 class="mb-4">Награды</h2>
                                        <ul>
                                        @foreach($hero->rewards as $index => $reward)
                                            <li class="title">
                                                <i class="fas fa-star"></i> <span>{{ $reward->rewardDate }}</span> <span>{{ $reward->reward }}</span>
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
                            <h1 class="mb-0">{{ $hero->lastName . ' ' . $hero->firstName . ' ' .$hero->secondName }}</h1>
                            @if($hero->dateBirthday)
                                <div class="mt-4">
                                @if($hero->dateBirthday)
                                    <div class="form-group row">
                                        <label for="dateBirthday" class="col-6 col-form-label">Дата рождения</label>
                                        <div class="col-6 date">
                                            <span id="dateBirthday">{{ $hero->dateBirthday }}</span>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            @endif
                            @if($hero->description)
                                <hr class="mb-4">
                                <div class="form-group row">
                                    <div class="col-12 description_block">
                                        {!! $hero->description !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if(count($hero->photos))
                            @foreach($hero->photos as $index => $photo)
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
                        @if(count($hero->videos))
                            @foreach($hero->videos as $index => $video)
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