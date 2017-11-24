<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        {!! Html::style('assets/img/apple-icon.png') !!}
        {!! Html::style('assets/img/favicon.png') !!}
        {!! Html::style('assets/css/bootstrap.min.css') !!}
        {!! Html::style('assets/css/material-dashboard.css') !!}
        {!! Html::style('assets/css/demo.css') !!}
        {!! Html::style('assets/css/style.css') !!}
        {!! Html::style('http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') !!}
        {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons') !!}   
    <title>{{ config('app.name', 'Laravel') }}</title>
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
{!! Html::script('assets/js/jquery-3.1.1.min.js') !!}
{!! Html::script('assets/js/jquery-ui.min.js') !!}
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/material.min.js') !!}
{!! Html::script('assets/js/perfect-scrollbar.jquery.min.js') !!}
{!! Html::script('assets/js/jquery.validate.min.js') !!}
{!! Html::script('assets/js/moment.min.js') !!}
{!! Html::script('assets/js/chartist.min.js') !!}
{!! Html::script('assets/js/jquery.bootstrap-wizard.js') !!}
{!! Html::script('assets/js/bootstrap-notify.js') !!}
{!! Html::script('assets/js/bootstrap-datetimepicker.js') !!}
{!! Html::script('assets/js/jquery-jvectormap.js') !!}
{!! Html::script('assets/js/nouislider.min.js') !!}
{!! Html::script('ttps://maps.googleapis.com/maps/api/js') !!}
{!! Html::script('assets/js/jquery.select-bootstrap.js') !!}
{!! Html::script('assets/js/jquery.datatables.js') !!}
{!! Html::script('assets/js/sweetalert2.js') !!}
{!! Html::script('assets/js/jasny-bootstrap.min.js') !!}
{!! Html::script('assets/js/fullcalendar.min.js') !!}
{!! Html::script('assets/js/jquery.tagsinput.js') !!}
{!! Html::script('assets/js/material-dashboard.js') !!}
{!! Html::script('assets/js/demo.js') !!}
{!! Html::script('assets/js/ajax.js') !!}
</html>
