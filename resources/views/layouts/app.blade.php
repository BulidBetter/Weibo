<!DOCTYPE html>
<html>
<head>
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
