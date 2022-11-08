<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title',env('APP_NAME'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="CreativeLayers">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-grid.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chosen.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors/colors.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    @if(env('APP_ENV') !== "local")
        <!-- Global site tag (gtag.js) - Google Ads: 607786685 -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=AW-607786685"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'AW-607786685');
                gtag('event', 'conversion', {'send_to': 'AW-607786685/s6H5CP7j0N8DEL2t6KEC'});

            </script>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-B65RQLXECF"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-B65RQLXECF');
        </script>

        @endif
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
    @yield('style')
</head>

<body>
<div class="theme-layout" id="scrollup">
    @include('layout.header')

    @yield('content')

    @include('layout.footer')

</div>


@include('layout.sign_in')
@include('layout.sign_up')
@include('layout.bottombar')
<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/script.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/popper.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/parallax.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/select-chosen.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/counter.js')}}" type="text/javascript"></script>
@stack('scripts')

<!-- LOGIN POPUP -->
<script>
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        $('#loginSubmitButton').attr('disabled', true);

        let email = $('#emailInput').val();
        let password = $('#passwordInput').val();

        $.ajax({
            url: "{{route('login.custom')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                email: email,
                password: password,
            },
            success: function (response) {
                $('#responseMessage').css('color', 'green').text("Giriş Başarılı");
                $('#loginSubmitButton').attr('disabled', false);
                setTimeout(function () {
                    $('.signin-popup-box').fadeOut('fast');
                    $('html').removeClass('no-scroll');
                    window.location.reload();
                }, 1500)
            },
            error: function (response) {
                console.log()
                let errors = response?.responseJSON?.errors

                let errorMessages = "";
                if (errors) {
                    for (const [key, value] of Object?.entries(errors)) {
                        console.log(`${key}: ${value}`);
                        errorMessages += value + " \n";
                    }
                } else {
                    errorMessages += response?.responseJSON?.message
                }

                $('#responseMessage').css('color', 'red').text(errorMessages);
                $('#loginSubmitButton').attr('disabled', false);
            },
        });
    });

    $('#signupForm').on('submit', function (e) {
        e.preventDefault();
        $('#signupSubmitButton').attr('disabled', true);

        let name = $('#nameRegisterInput').val();
        let email = $('#emailRegisterInput').val();
        let password = $('#passwordRegisterInput').val();
        let phone = $('#phoneRegisterInput').val();

        $.ajax({
            url: "{{route('register.custom')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                email: email,
                name: name,
                password: password,
                phone: phone,
                type: userType,
            },
            success: function (response) {
                $('#responseMessage').css('color', 'green').text("Giriş Başarılı");
                $('#loginSubmitButton').attr('disabled', false);
                setTimeout(function () {
                    $('.signin-popup-box').fadeOut('fast');
                    $('html').removeClass('no-scroll');
                    window.location.reload();
                }, 1500)
            },
            error: function (response) {
                console.log()
                let errors = response?.responseJSON?.errors

                let errorMessages = "";
                if (errors) {
                    for (const [key, value] of Object?.entries(errors)) {
                        console.log(`${key}: ${value}`);
                        errorMessages += value + " \n";
                    }
                } else {
                    errorMessages += response?.responseJSON?.message
                }

                $('#responseMessage').css('color', 'red').text(errorMessages);
                $('#loginSubmitButton').attr('disabled', false);
            },
        });
    });

    setTimeout(function () {
        $('.tox-notifications-container').hide()
    }, 2000)
</script>


</body>

</html>
