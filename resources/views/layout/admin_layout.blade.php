<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME')}}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body style="background-color:rgb(231 226 190 / 38%);overflow:hidden">
    <nav>
        <p>Booking App System</p><hr/>
    </nav>
    <div class="">
        <div class="row justify-content-center pt-2">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
        </div>
        <div class="row justify-content-center">
            
           

           @yield('content')
     </div>
    </div> 

 
 <script src="{{ asset('js/app.js') }}"></script>
 <script>
     $('div.alert').delay(3000).slideUp(300);
     </script>
</body>
</html>
   