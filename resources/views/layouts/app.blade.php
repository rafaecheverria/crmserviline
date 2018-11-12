<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') !!}
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons') !!}   
    <title>{{ config('app.name', 'Serviline') }}</title>
</head>
<body>
    <div class="wrapper">
       @include('layouts.sidebar')
        <div class="main-panel">
           @include('layouts.principal')
           @yield('content')
        </div>
    </div>  
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>