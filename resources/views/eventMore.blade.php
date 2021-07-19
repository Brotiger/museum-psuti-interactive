@extends('layouts.main')
@section('title')
Событие - {{ !empty($event)? $event->name : '' }}
@endsection
@section('content')
    <div class="container-fuild info-page">
                <div class="row mb-3">
                    <div class="col-4 left-info">
                        <div class="row">
                            <div class="col-12">
                                <div class="block-container block">
                                    <h2 class="mb-0 h1">Событие</h2>
                                </div>
                                <div class="block-container block-info">
                                    <h1 class="mb-0">{{ $event->name }}</h1>
                                    @if($event->date)
                                        <div class="mt-4">
                                            <div class="form-group my-3 row">
                                                <label for="dateBirthday" class="col-6 col-form-label">Дата события</label>
                                                <div class="col-6 date">
                                                    <span id="dateBirthday">{{ $event->date }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 right-info">
                        @if($event->description)
                            <div class="block-container personal-info">
                                <h2 class="mb-4">Описание</h2>
                                <div class="form-group row">
                                    <div class="col-12 description_block">
                                        {!! $event->description !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(count($event->photos))
                            @foreach($event->photos as $index => $photo)
                                <div class="block-container block-info photo-block">
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
                        @if(count($event->videos))
                            @foreach($event->videos as $index => $video)
                                <div class="block-container block-info video-block">
                                    @if($video->videoName)
                                        <h3 class="mb-4">{{ $video->videoName }}</h3>
                                    @endif
                                    @if($video->videoDate)
                                        <hr>
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