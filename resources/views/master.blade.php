<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KnowMyC2</title>
    @include('partials.header')

</head>
<body>
    @include('partials.nav')
    <div>
        <div class="center-loading">{!! HTML::image('images/ajax-loader.gif') !!}</div>
        <div id="content">
            @yield('content')
        </div>
        <?php /*<div id="content" class="container-fluid">
            @if (Session::has('flash_message'))
            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @endif


        </div>
        */?>
    </div>
    @include('partials.footer')
</body>
</html>