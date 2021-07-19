@extends('layouts.main')
@section('title')
{{ !empty($unit)? $unit->fullUnitName : '' }}
@endsection
@section('content')
    <div class="container-fuild page">
                <div class="row mb-3">
                    <div class="col-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="block-container block">
                                    <h2 class="mb-0 h1">{{ $page->title }}</h2>
                                </div>

                                <div class="block-container block-info">
                                    <div>
                                        <input type="button" value="Главная" class="pageBtn">
                                    </div>
                                    <div>
                                        <input type="button" value="Фото архив" class="pageBtn">
                                    </div>
                                    <div>
                                        <input type="button" value="Видео архив" class="pageBtn">
                                    </div>
                                    <div>
                                        <input type="button" value="История от первого лица" class="pageBtn">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        @if(count($page->posts))
                            <div class="block">
                                @foreach($page->posts as $index => $post)
                                    @if($post->title)
                                        <h2 class="h1">{{ $post->title }}</h2>
                                        <hr>
                                    @endif
                                    <p class="mb-0">{!! $post->description !!}</p>
                                    @if($post->photo)
                                    <div class="block-container photo-block mt-4 {{ $index != count($page->posts) - 1 ? 'mb-4' : '' }}">
                                        <div class='content'>
                                            <img fullscreen src="{{ $storageServer . $post->photo }}" class="user-photo">
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
    </div>
    @endsection