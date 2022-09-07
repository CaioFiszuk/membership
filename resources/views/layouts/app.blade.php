<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="{{asset('assets/styles/bootstrap.min.css')}}">
</head>
<body>
    @yield('content')

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>