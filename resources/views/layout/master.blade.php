<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/favicon-nak-32x32.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title') - NaK News</title>
</head>

<body>
    @include('shared.spinner')
    @include('shared.navbar')
    @yield('content');
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(window).on("load",function(){
          $(".loader-wrapper").fadeOut("slow");
        });
    </script>
</body>

</html>