@extends('layouts.main')
@section('title')
{{ !empty($unit)? $unit->fullUnitName : '' }}
@endsection
@section('custom_css')
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
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
                                        <input type="button" value="Главная" class="pageBtn" onclick="openCity(event, 'page')" id="defaultTab">
                                    </div>
                                    <div>
                                        <input type="button" value="Фото архив" class="pageBtn" onclick="openCity(event, 'photoArchive')">
                                    </div>
                                    <div>
                                        <input type="button" value="Видео архив" class="pageBtn" onclick="openCity(event, 'videoArchive')">
                                    </div>
                                    <div>
                                        <input type="button" value="История от первого лица" class="pageBtn" onclick="openCity(event, 'history')">
                                    </div>
                                </div>
                                <div class="block-info tabcontent helpWindow" ell="page" active=true>
                                    <button closeWindow class="closeWindow"><i class="fas fa-times"></i></button>
                                    <h2 class="mb-4">Подсказка</h2>
                                    <p class="my-0">Для увеличения размера фотографии нажмите на нее.</p>
                                </div>
                                <div class="block-info tabcontent helpWindow" ell="history" active=true>
                                    <button closeWindow class="closeWindow"><i class="fas fa-times"></i></button>
                                    <h2 class="mb-4">Подсказка</h2>
                                    <p class="my-0">Если вы являетесь сотрудником ПГУТИ вы можете написать свою историю от первого лица по адресу enter.museum.psuti.ru.</p>
                                </div>
                                @if(count($page->photos))
                                <div class="block-info tabcontent" ell="photoArchive" id="photo-info">
                                    <h2 class="mb-4">Информация о фото</h2>
                                    <div>
                                        <p class="my-0" id="photoName"></p>
                                        <hr>
                                    </div>
                                    <div id="photoDateBlock" class="form-group row">
                                        <span id="photoDate"></span>
                                    </div>
                                </div>
                                @endif
                                @if(count($page->videos))
                                <div class="block-info tabcontent" ell="videoArchive" id="video-info">
                                    <h2 class="mb-4">Информация о видео</h2>
                                    <div>
                                        <p class="my-0" id="videoName"></p>
                                        <hr>
                                    </div>
                                    <div id="videoDateBlock" class="form-group row">
                                        <span id="videoDate"></span>
                                    </div>
                                </div>
                                @endif
                                <div class="block-info tabcontent helpWindow" ell="photoArchive" active=true>
                                    <button closeWindow class="closeWindow"><i class="fas fa-times"></i></button>
                                    <h2 class="mb-4">Подсказка</h2>
                                    <p class="my-0">Для смены просматриваемой фотографии в фото архиве, проведите по ней рукой с права на лево (или в обратном направлении).</p>
                                </div>
                                <div class="block-info tabcontent helpWindow" ell="videoArchive" active=true>
                                    <button closeWindow class="closeWindow"><i class="fas fa-times"></i></button>
                                    <h2 class="mb-4">Подсказка</h2>
                                    <p class="my-0">Для смены просматриваемой видео в видео архиве, проведите по нему рукой с права на лево (или в обратном направлении).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tabcontent" ell="page">
                            <div class="block">
                                <h2 class="mb-0 h1">Главная</h2>
                            </div>
                            <div class="block-info">
                                @if(count($page->posts))
                                    @foreach($page->posts as $index => $post)
                                        @if($post->title)
                                            <h2>{{ $post->title }}</h2>
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
                                @else
                                    <p class="text-center">Ничего не найдено</p>
                                    <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
                                @endif
                            </div>
                        </div>
                        <div class="tabcontent" ell="photoArchive">
                            <div class="block">
                                <h2 class="mb-0 h1">Фото архив</h2>
                            </div>
                            <div class="block-info">
                                @if(count($page->photos))
                                    <div class="owl-carousel owl-theme" id="photoArhiveCarousel">
                                        @foreach($page->photos as $index => $photo)
                                            <div class="item">
                                                <img fullscreen src="{{ $storageServer . $photo->photo }}" photoDate="{{ $photo->photoDate }}" photoName="{{ $photo->photoName }}">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-center">Ничего не найдено</p>
                                    <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
                                @endif
                            </div>
                        </div>
                        <div class="tabcontent" ell="videoArchive">
                            <div class="block">
                                <h2 class="mb-0 h1">Видео архив</h2>
                            </div>
                            <div class="block-info">
                                @if(count($page->videos))
                                    <div class="owl-carousel owl-theme" id="videoArhiveCarousel">
                                        @foreach($page->videos as $index => $video)
                                            <div class="item" fullscreen-video  videoId="{{ $video->video }}" videoDate="{{ $video->videoDate }}" videoName="{{ $video->videoName }}">
                                                <i class="play-video far fa-play-circle"></i>
                                                <img src="{{ $video->snippet }}">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-center">Ничего не найдено</p>
                                    <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
                                @endif
                            </div>
                        </div>
                        <div class="tabcontent history-block" ell="history">
                            <div class="block">
                                <h2 class="mb-0 h1">История от первого лица</h2>
                            </div>
                            <div class="block-info">
                                @if(count($page->history))
                                    @foreach($page->history as $index => $history)
                                        <div>
                                            <h3 class="mb-4">{{ isset($history->user)? (isset($history->user->name) ? $history->user->name : $history->user->email) : 'Без автора (автор удален)' }}</h3>
                                            <p class="my-0">{{ $history->comment }}</p>
                                            <hr>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-center">Ничего не найдено</p>
                                    <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    @endsection
    @section('custom_js')
    <script src="/js/owl.carousel.min.js"></script>
    <script>
        $('#videoArhiveCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            items: 1,
            dots: false,
            video:true,
        }).on('drag.owl.carousel', function(){
            fullscreenAllow = false;
        }).on('dragged.owl.carousel', function(){
            setTimeout(() => {
                fullscreenAllow = true;
            }, 1);
            setVideoInfo();
        });

        setVideoInfo();

        $('#photoArhiveCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            items: 1,
            dots: false
        }).on('drag.owl.carousel', function(){
            fullscreenAllow = false;
        }).on('dragged.owl.carousel', function(){
            setTimeout(() => {
                fullscreenAllow = true;
            }, 1);
            setPhotoInfo();
        });

        setPhotoInfo();

        function setPhotoInfo(){
            let photoDate = $("#photoArhiveCarousel .owl-item.active img").attr('photoDate');
            let photoName = $("#photoArhiveCarousel .owl-item.active img").attr('photoName');

            if(!photoDate && !photoName){
                $("#photo-info").hide();
            }else{
                $("#photo-info").show();
            }

            if(!photoDate){
                $("#photoDateBlock").hide();
            }else{
                $("#photoDateBlock").show();
            }

            if(!photoName){
                $("#photoName").hide();
            }else{
                $("#photoName").show();
            }

            if(!photoDate || !photoName){
                $("#photo-info hr").hide();
            }else{
                $("#photo-info hr").show();
            }

            $('#photoDate').text(photoDate);
            $('#photoName').text(photoName);
        }

        function setVideoInfo(){
            let videoDate = $("#videoArhiveCarousel .owl-item.active .item").attr('videoDate');
            let videoName = $("#videoArhiveCarousel .owl-item.active .item").attr('videoName');

            console.log(videoDate);
            console.log(videoName);

            if(!videoDate && !videoName){
                $("#video-info").hide();
            }else{
                $("#video-info").show();
            }

            if(!videoDate){
                $("#videoDateBlock").hide();
            }else{
                $("#videoDateBlock").show();
            }

            if(!videoName){
                $("#videoName").hide();
            }else{
                $("#videoName").show();
            }

            if(!videoDate || !videoName){
                $("#video-info hr").hide();
            }else{
                $("#video-info hr").show();
            }

            $('#videoDate').text(videoDate);
            $('#videoName').text(videoName);
        }
    </script>
    <script>
        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            $("[ell="+ cityName +"]").each(function(){
                if($(this).attr('active') != 'false'){
                    $(this).show();
                }
            });

            evt.currentTarget.className += " active";
            showBtn();
        }

        document.getElementById("defaultTab").click();
    </script>
    @endsection