<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Şifre sıfırlama</title>
</head>
<body>
<div class="container text-center">
    <div class="row" style="background-color: #0b1b46">
        <div class="col-lg-6">

        </div>
        <div class="col-lg-6">
            <img style="width: 100px; margin-left: auto; margin-right: auto;"
                 src="{{asset('assets/images/logo.png')}}" alt=""/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="font-weight-bold mx-auto">Şifrenizi yenileyin</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <p class="text-gray mx-auto">
                Aşağıdaki linke tıklayarak yeni şifrenizi belirleyiniz
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center mx-auto">
            <a class="btn btn-primary" href="{{$url}}">Şifrenizi Sıfırlayın</a>
        </div>
    </div>
    <div class="row" style="background-color: #0b1b46;  height:50px;">
        <div class="col-lg-12 text-center justify-content-center">
            <p style="color: white; text-align: center; margin: 10px;">
                {{env('APP_NAME')}}
            </p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
