<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset ('css/bootstrap-icons.css') }}">
    <script type="text/javascript" src="{{asset ('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body class="bg-black">
@include('app.navbar')


@yield('body')


</body>
</html>