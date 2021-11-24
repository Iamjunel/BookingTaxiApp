<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME')}}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <!-- React root DOM -->
    </nav>
    <div id="app" style="overflow:hidden">
    </div>

    <!-- React JS -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>