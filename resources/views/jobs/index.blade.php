<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>
        @section('title')
            İş ilanları
        @endsection
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="CreativeLayers">
    <style>
        @media screen and (min-width: 800px) {
            .job-list {
                margin-top: 50px;
            }
        }
    </style>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors/colors.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>

<body>
<div class="theme-layout" id="scrollup">
    @include('layout.header')
    <section >
        <div class="gray homepage-slider">
            <div id="app" class="mt-5">
                <job-list class="job-list" :isLoggedIn="'{{auth()->check()}}'"
                          currentLocation="{{ucfirst(strtolower($selectedCity->name))}}'d{{is_last_letter_bold($selectedCity->name) ? 'a' : 'e'}}ki iş ilanları"></job-list>
            </div>
        </div>
    </section>
    @include('layout.footer')

</div>


@include('layout.sign_in')
@include('layout.sign_up')
@include('layout.bottombar')
</body>
<script src="{{asset('js/app.js')}}"></script>

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

</html>
