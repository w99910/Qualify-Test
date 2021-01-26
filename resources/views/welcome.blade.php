<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DashBoard</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body class="font-poppins antialiased min-h-screen sm:h-screen sm:w-screen overflow-auto sm:overflow-hidden m-0 p-0">
    <div id="app" class="w-full h-full">
        <Home></Home>
    </div>

    </body>
</html>
