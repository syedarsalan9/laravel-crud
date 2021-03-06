<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- CSRF Token -->
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ url('/assets/css/authentication.css') }}" type="text/css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
    <body>
        @yield('content')
        <script src="{{ url('/assets/js/authentication.js') }}"></script>
        
    </body>
</html>
