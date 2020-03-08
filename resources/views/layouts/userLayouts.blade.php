<style>

    html {
        height: 100%;
    }

    body {
        min-height: 100%;
        background-color: white !important;
    }
</style>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url("/css/style.css")}}">

    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/font-awesome/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/dropzone.css">
    <script type="text/javascript" src="/js/cycle.js"></script>
</head>
<style>
    @font-face {
        font-family: special;
        src: url('/public/fonts/yekan.ttf') format('truetype');
    }
</style>
<body style="font-family: iran">

@include('layouts.header.header')

@yield('content')
<script type="text/javascript" src="/js/dropzone.js"></script>

<script type="text/javascript" src="/js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/dropzone.js"></script>

<script type="text/javascript">
    $("#check2").click(function () {


        if ($(this).is(":checked")) {
            $("#price2").val("  6000توان");
            $('#pardakht').fadeIn(500);

        } else {
            $("#price2").val("هیچ چیز");
            $('#pardakht').fadeOut(500);


        }
    });
    $(".send-advert2").click(function () {


    });
    // $(document).ready(function () {
    //     $('select').niceSelect();
    // });
    Dropzone.options.dropzone = {

        paramName: "file",
        maxFilesize: 5,

        success: function (file, response) {
            $("#boatAddForm").append(('<input type="text" ' +
                'name="images[1]" ' +
                'value="' + response + '"  >'));

        }


    };

    Dropzone.options.dropzone1 = {

        paramName: "file",
        maxFilesize: 5,

        success: function (file, response) {
            $("#boatAddForm1").append(('<input type="text" ' +
                'name="images[]" ' +
                'value="' + response + '"  >'));

        }


    };

    Dropzone.options.dropzone2 = {

        paramName: "file",
        maxFilesize: 5,

        success: function (file, response) {
            $("#boatAddForm2").append(('<input type="text" ' +
                'name="images[]" ' +
                'value="' + response + '"  >'));

        }


    };

    Dropzone.options.dropzone5 = {

        paramName: "file",
        maxFilesize: 5,

        success: function (file, response) {
            $("#editimage").append(('<input type="text" ' +
                'name="images[]" ' +
                'value="' + response + '"  >'));

        }


    };


    $('.slider').cycle({
        fx: 'fade',
        speed: 'fast',
        timeout: 1000,
        pager: '#nav_item',


    });


</script>
</body>
</html>
