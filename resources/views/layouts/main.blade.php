<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <link rel="shortcut icon" href="/images/favicon-min.png" type="image/x-icon">
</head>
    <body>
        <header>
            <div class="row">
                <div class="col text-center"><a href="javascript:history.go(-1)"><i class="fas fa-arrow-left"></i></a></div>
                <div class="col-10 text-center">Электронный музей ПГУТИ и КС ПГУТИ</div>
                <div class="col text-center"><a href="javascript:history.go(+1)"><i class="fas fa-arrow-right"></a></i></div>
            </div>
        </header>
        @yield('content')
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/4f55501494.js" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    @yield('custom_js')
</html>