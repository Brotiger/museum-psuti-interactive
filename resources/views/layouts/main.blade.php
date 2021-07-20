<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="shortcut icon" href="/images/favicon-min.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/app.css">
    @yield('custom_css')
    <script src="https://kit.fontawesome.com/4f55501494.js" crossorigin="anonymous"></script>
    <script src="/js/app.js" defer></script>
</head>
    <body>
        <div class="cover" style="display: none">
        </div>
        <div class="fullscreen" id="fullscreen" style="display: none">
            <button class="close-full-photo" id="close-full-photo"><i class="fas fa-times"></i></button>
            <div class="fullscreen-container">
                <img src="">
            </div>
        </div>
        <!--<div class="preloader">
            <svg class="preloader__image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor"
                    d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z">
                </path>
            </svg>
        </div>-->
        <header name="top">
            <div class="col-1 d-flex justify-content-start align-items-center">
                <a href="javascript:history.go(-1)"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="col-10 text-center">
                <a href="/">Электронный музей ПГУТИ и КС ПГУТИ</a>
            </div>
            <div class="col-1 d-flex justify-content-end align-items-center">
                <a href="javascript:history.go(+1)"><i class="fas fa-arrow-right"></i></a>
            </div>
        </header>
        @yield('content')
        <div>
            <button class="btn-home" onclick="location.href='/'" style="display: none" id="homeBtn">
                <i class="fas fa-home"></i>
            </button>
            <button class="btn-top" onclick="location.href='#top'" style="display: none" id="topBtn">
                <i class="fas fa-arrow-up"></i>
            </button>
        </div>
        <footer class="text-center">
            <a href="#">© ПГУТИ & Brotiger @php echo date('Y') @endphp</a>
        </footer>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var fullscreenAllow = true;

        $('body').delegate('[fullscreen]', 'click', function(){
            if(fullscreenAllow){
                $("#fullscreen img").attr("src", $(this).attr("src"));
                $(".cover, #fullscreen").show();
                $('body').css('overflow', 'hidden');
            }
        });

        $("#close-full-photo").click(function(){
            $("#fullscreen, .cover").hide();
            $('body').css('overflow', 'auto');
        });

        $(document).ready(function(){
            showBtn();
        });

        $("[closeWindow]").click(function(){
            $(this).parent().attr('active', 'false');
            $(this).parent().hide();
        });

        function showBtn(){
            if (location.pathname != "/"){
                if ($(document).height() > $(window).height()) {
                    $("#topBtn").show();
                }else{
                    $("#topBtn").hide();
                }
                $("#homeBtn").show();
            }
        }
    </script>
    <!--<script src="/js/loading.js" defer></script>-->
    <!--<script>
        $(document).ready(function(){
            stopLoading();
        });
    </script>-->
    @yield('custom_js')
</html>