<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DashBoard</title>
        <link rel="stylesheet" href="{{secure_asset('css/app.css')}}"/>
        <script src="{{secure_asset('js/app.js')}}" defer></script>
    </head>
    <body class="antialiased h-screen w-screen bg-gray-300">
    <div id="app" class="w-full h-full">
        <Home></Home>
    </div>

    </body>
</html>
