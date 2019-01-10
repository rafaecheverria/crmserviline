<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8" />

    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />

    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <meta name="viewport" content="width=device-width" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">-->

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    <title>{{ config('app.name', 'Serviline') }}</title>

</head>

<body>

<nav class="navbar navbar-primary navbar-transparent navbar-absolute">

        <div class="container">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand" href="{{route('login')}}">SGA SERVILINE</a>

            </div>

        </div>

    </nav>

    <div class="wrapper wrapper-full-page">

        <div class="full-page login-page" filter-color="black" data-image="{{ asset('images/login-back.jpg') }}">

            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->

            <div class="content">

                <div class="container">

                    <div class="row">

                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">

                            <form id="form_login" role="form">

                            {{ csrf_field() }}

                                <div class="card card-login card-hidden">

                                    <div class="card-header text-center" data-background-color="red">

                                        <h4 class="card-title">Iniciar Sesión</h4>

                                    </div>

                                    <div class="card-content">

                                        <div class="input-group">

                                            <span class="input-group-addon">

                                                <i class="material-icons">person</i>

                                            </span>

                                            <div class="form-group label-floating">

                                                <input type="text" name="rut" id="rut" class="form-control" placeholder="11.111.111-1" autofocus="autofocus">

                                            </div>

                                        </div>

                                        <div class="input-group">

                                            <span class="input-group-addon">

                                                <i class="material-icons">lock_outline</i>

                                            </span>

                                            <div class="form-group label-floating">
                                                
                                                <input type="password" name="password" class="form-control" placeholder="Contraseña">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="footer text-center">

                                        <button id="ingresar" class="btn btn-rose btn-simple btn-wd btn-lg">Entrar</button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            <footer class="footer">

                <div class="container">

                    <p class="copyright pull-right">

                        &copy;

                        <script>

                            document.write(new Date().getFullYear())

                        </script>

                        <a href="http://www.serviline.cl">Serviline</a>, Hecho para mejorar las gestiones administrativas.

                    </p>

                </div>

            </footer>

        </div>

    </div>

<script src="{{ asset('js/app.js') }}"></script>


<script type="text/javascript">

    $().ready(function() {

        demo.checkFullPageBackgroundImage();

        setTimeout(function() {

            // after 1000 ms we add the class animated to the login/register card

            $('.card').removeClass('card-hidden')

        }, 700)

    })
</script>

</body>
</html>
