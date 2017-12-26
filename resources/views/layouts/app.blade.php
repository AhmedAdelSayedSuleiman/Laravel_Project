<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <script src="{{asset('js/gquery.app.js')}}" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
 

        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <link href="https://bootswatch.com/4/flatly/bootstrap.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="app">


        @include('includes.navbar')
        @yield('content')

        @include('includes.msgerror')

        
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"> </script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
