<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Jobhunt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="CreativeLayers">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-grid.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<div class="theme-layout" id="scrollup">

    <section>
        <div id="app">
            <job-create csrf="{{ csrf_token() }}" telefon="{{auth()->check() ? auth()->user()->phone : ''}}"></job-create>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </section>
</div>

</body>
</html>
