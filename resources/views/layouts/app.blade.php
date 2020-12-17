<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta charset="utf-8" />
    <title>@yield('title') - Web App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>

@include('layouts._header')
<div class="container">
    @yield('content')
    @include('layouts._footer')
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
