<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME')}}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
   
</head>
<body style="background-color:#1885f5ad;overflow-y:auto;overflow-x:hidden">
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
    $(document).ready(function(){
    $('#field-test2').on('click', function(){
        $( "#field-test" ).append(',' + $( "#field-test2" ).val()); 
    });
});
    
</script>


</body>
</html>
   