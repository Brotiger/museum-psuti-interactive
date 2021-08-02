@extends('layouts.main')
@section('title')
Подразделение - {{ !empty($unit)? $unit->fullUnitName : '' }}
@endsection
@section('content')
    <div class="container-fuild info-page">
                <div class="row mb-3">
                    <div class="col-4 left-info wow slideInLeft object-non-visible">
                        <div class="row">
                            <div class="col-12">
                                <div class="block-container block">
                                    <h2 class="mb-0 h1">Подразделение</h2>
                                </div>

                                <div class="block-container block-info">
                                    <h1 class="mb-0">{{ $unit->fullUnitName }} {{ $unit->shortUnitName ? '('. $unit->shortUnitName .')' : '' }}</h1>

                                    @if($unit->creationDate || $unit->terminationDate)
                                        <div class="mt-4">
                                        @if($unit->creationDate)
                                            <div class="form-group row">
                                                <label for="dateBirthday" class="col-6 col-form-label">Дата создания</label>
                                                <div class="col-6 date">
                                                    <span id="dateBirthday">{{ $unit->creationDate }}</span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($unit->terminationDate)
                                            <div class="form-group row">
                                                <label for="hired" class="col-6 col-form-label">Дата прекращения</label>
                                                <div class="col-6 date">
                                                    <span id="hired">{{ $unit->terminationDate }}</span>
                                                </div>
                                            </div>
                                        @endif
                                        </div>
                                    @endif
                                </div>
                                @if($unit->typeUnit)
                                    <div class="block-container block-info">
                                        <h2 class="mb-4">Тип подразделения</h2>
                                        <span>{{ $unit->typeUnit }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-8 right-info">
                        @if($unit->description)
                            <div class="block-container personal-info wow slideInRight object-non-visible">
                                <h2 class="mb-4 h1">Описание</h2>
                                <div class="form-group row">
                                    <div class="col-12 description_block">
                                        {!! $unit->description !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(count($unit->photos))
                            @foreach($unit->photos as $index => $photo)
                                <div class="block-container {{ $unit->description || $index != 0? 'block-info' : 'block' }} photo-block wow slideInRight object-non-visible">
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
                        @if(count($unit->videos))
                            @foreach($unit->videos as $index => $video)
                                <div class="block-container {{ count($unit->photos) == 0 && $index == 0? 'block' : 'block-info' }} video-block wow slideInRight object-non-visible">
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