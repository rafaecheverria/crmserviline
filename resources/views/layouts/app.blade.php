<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--{!! Html::style('assets/img/apple-icon.png') !!}
    {!! Html::style('assets/img/favicon.png') !!}-->
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/demo.css') !!}
    {!! Html::style('assets/css/style.css') !!}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') !!}
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons') !!}   
    {!! Html::style('assets/css/material-dashboard.css') !!}
    
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
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/material.min.js"></script>
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/locale.js"></script>
<script src="assets/js/chartist.min.js"></script>
<script src="assets/js/jquery.bootstrap-wizard.js"></script>
<script src="assets/js/bootstrap-notify.js"></script>
<script src="assets/js/bootstrap-datetimepicker.js"></script>
<!--<script src="assets/js/jquery-jvectormap.js"></script>-->
<script src="assets/js/nouislider.min.js"></script>
<!--<script src="assets/js/https://maps.googleapis.com/maps/api/js"></script>-->
<script src="assets/js/jquery.select-bootstrap.js"></script>
<script src="assets/js/jquery.datatables.js"></script>
<script src="assets/js/jasny-bootstrap.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="plugins/fullcalendar/locale/es.js"></script>
<script src="assets/js/jquery.tagsinput.js"></script>
<script src="assets/js/material-dashboard.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/jquery.Rut.js"></script>
<script src="assets/js/calendarios.js"></script>
<script src="assets/js/ajax.js"></script>
<script src="assets/js/listas.js"></script>

</html>
