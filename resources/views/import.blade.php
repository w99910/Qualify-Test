<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DashBoard</title>
    <link rel="stylesheet" href="{{secure_asset('css/app.css')}}"/>
    <script src="{{secure_asset('js/app.js')}}" defer></script>
</head>
<body class="w-screen h-screen m-0 p-2">
   <div class="w-full h-full flex flex-col">
       @if(Session::has('message'))
           <div class="w-1/2 bg-green-500">
                  {{Session::get('message')}}
           </div>
       @endif
       <form method="POST" action="{{route('crude_import')}}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" required>
            <button type="submit">Upload Crude</button>
            @error('file')
            <span>{{$message}}</span>
            @enderror
        </form>
           <form method="POST" action="{{route('expect_import')}}" enctype="multipart/form-data">
               @csrf
               <input type="file" name="file" required>
               <button type="submit">Upload Expect Birth Rates</button>
               @error('file')
               <span>{{$message}}</span>
               @enderror
           </form><form method="POST" action="{{route('nurse_import')}}" enctype="multipart/form-data">
               @csrf
               <input type="file" name="file" required>
               <button type="submit">Upload Nurse</button>
               @error('file')
               <span>{{$message}}</span>
               @enderror
           </form><form method="POST" action="{{route('doctor_import')}}" enctype="multipart/form-data">
               @csrf
               <input type="file" name="file" required>
               <button type="submit">Upload doctor</button>
               @error('file')
               <span>{{$message}}</span>
               @enderror
           </form><form method="POST" action="{{route('pharmacist_import')}}" enctype="multipart/form-data">
               @csrf
               <input type="file" name="file" required>
               <button type="submit">Upload pharmacist</button>
               @error('file')
               <span>{{$message}}</span>
               @enderror
           </form>
   </div>
</body>
</html>
