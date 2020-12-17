<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>@yield('title') - Web App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>

<div class="navbar navbar-expand-lg navbar-dark bg-dark navbar-static-top">
    <div class="container">
        <a class="navbar-brand" href="/" title="">Weibo App</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="help" title="">帮助</a></li>
                <li class="nav-item"><a class="nav-link" href="#" title="">登录</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
