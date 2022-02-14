<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Bootstrap-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('assets/images/people.ico')}}" type="image/x-icon">
    
    <!--Title-->
    <title>{{config('app.name')}}</title>
</head>

<body> 
    @yield('content')
</body>
</html>