<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feed Me</title>

    <link rel="stylesheet" type="text/css" href="{{ url('/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/vendor/font-awesome/css/font-awesome.min.css') }}">
</head>
<body>
    @yield('content')

    <script type="text/javascript" src="{{ url('/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
