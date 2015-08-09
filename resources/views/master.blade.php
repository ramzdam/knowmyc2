<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>C2Log</title>
    @include('partials.header')
</head>
<body>
    @include('partials.nav')
    <div>

        <div class="navigation-sidebar">@yield('sidebar')</div>
        <div class="container-fluid">
            @if (Session::has('flash_message'))
            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
    @include('partials.footer')
</body>
</html>