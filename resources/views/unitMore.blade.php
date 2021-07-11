@extends('layouts.main')
@section('title')
Подразделение - {{ !empty($unit)? $unit->fullUnitName : '' }}
@endsection
@section('content')
    <div class="container-fuild info-page">
                <div class="row mb-3">
                    <div class="col-sm-4 left-info">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="block-container block">
                                    <h2 class="mb-0 h1">Подразделение</h2>
                                </div>

                                <div class="block-container block-info">
                                    <h1 class="mb-0">{{ $unit->fullUnitName }} {{ $unit->shortUnitName ? '('. $unit->shortUnitName .')' : '' }}</h1>

                                    @if($unit->creationDate || $unit->terminationDate)
                                        <div class="mt-4">
                                        @if($unit->creationDate)
                                            <div class="form-group my-3 row">
                                                <label for="dateBirthday" class="col-6 col-form-label">Дата рождения</label>
                                                <div class="col-sm-6 date">
                                                    <span id="dateBirthday">{{ $unit->creationDate }}</span>
                                                </div>
                                            </div>
                                        @endif
                                        @if($unit->terminationDate)
                                            <div class="form-group my-3 row">
                                                <label for="hired" class="col-6 col-form-label">Дата приема</label>
                                                <div class="col-sm-6 date">
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
                    <div class="col-sm-8 right-info">
                        @if($unit->description)
                            <div class="block-container personal-info">
                                <h2 class="mb-4">Описание</h2>
                                <div class="form-group row">
                                    <div class="col-sm-12 description_block">
                                        {!! $unit->description !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(count($unit->photos))
                            @foreach($unit->photos as $index => $photo)
                                <div class="block-container block-info user-photo-block">
                                    @if($photo->photoName)
                                        <h3 class="mb-4">{{ $photo->photoName }}</h3>
                                    @endif
                                    @if($photo->photoDate)
                                        <div class="mb-4">{{ $photo->photoDate }}</div>
                                    @endif
                                    <div class='content'>
                                        <img src="{{ $storageServer . $photo->photo }}" class="user-photo">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if(count($unit->videos))
                            @foreach($unit->videos as $index => $video)
                                <div class="block-container block-info user-video-block">
                                    @if($video->videoName)
                                        <h3 class="mb-4">{{ $video->videoName }}</h3>
                                    @endif
                                    @if($video->videoDate)
                                        <div class="mb-4">{{ $video->videoDate }}</div>
                                    @endif
                                    <div class='content'>
                                        <iframe src="{{ 'https://www.youtube.com/embed/'.$video->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
    </div>
    @endsection