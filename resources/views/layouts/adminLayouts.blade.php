<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سایت دیوار</title>
    {{--<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">--}}

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="/font-awesome/css/font-awesome.css">
</head>
<body>

@include('layouts.header')
<div class="col-lg-12" style="float: left">
    <div class="col-lg-3" style="float: right">
        @include('layouts.sidebar')
    </div>

    {{-- we use div class beacuse we want to say that the app id in app .js file figure vue.js--}}
    <div id="app" style="float: left;width: 83%">
        <div class="col-lg-9" style="max-width: 83%;margin: 0 auto;position: relative;right: -97px;top: 10px;">
            @yield('content')

        </div>
    </div>
</div>
<script type="text/javascript" src="/js/app.js">

</script>
</body>
</html>