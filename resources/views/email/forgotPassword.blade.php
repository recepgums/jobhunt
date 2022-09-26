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
<div class="contanier">
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
            <p class="font-weight-bold">Merhabalar sayın {{ $details['email'] }} şifrenizi sıfırlayın</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum."</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <a href="#">Şifrenizi Sıfırlayın</a>
        </div>
    </div>
    <div class="row" style="background-color: #0b1b46;  height:50px;">
        <div class="col-lg-12 text-center">
            <p style="color: white; text-align: center; margin: 10px;">firinci.isbull.com</p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
