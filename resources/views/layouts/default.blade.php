<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team-Bet - Plateforme de tipsters en paris sportifs multisport</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('img/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}">
</head>

<body>

<header>
 @include('partials/navbar')
</header>

@yield('content')


@include('partials/footer')


<script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/wow.min.js') }}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

</body>

</html>