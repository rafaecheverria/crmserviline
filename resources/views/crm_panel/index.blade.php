@extends('layouts.app')

@section('content')

<div class="content">

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-content text-center">

                    <code>col-md-4</code>

                </div>

            </div>

        </div>

    </div>

    <!-- ELEMENTOS DEL ESTADO PROSPECTOS -->

    <div class="row">

        <div class="col-md-12">

            <div class="col-md-15 panel-contenido">

                <ul class="list-group prospecto">

                    <li href="#" class="list-group-item titulos">

                        <b>
                            <h6 class="list-group-item-heading">

                                <i class="material-icons pull-right text-warning">label_important</i>

                                PROSPECTOS

                            </h6>

                        </b>

                    </li>

                    @foreach($prospectos as $prospecto)

                        <li id="{{ $prospecto->id }}" name="{{ $prospecto->nombre }}" class="list-group-item list-group-item-action">

                            @if($prospecto->fecha_actualizado_difference()  < 3)

                                 <span class="badge">

                                    <a href="#">

                                        <i class="material-icons text-success" style="font-size: 17px;">check_circle</i>

                                    </a>

                                    <a href="#" onclick="on_off('', '{{$prospecto->id}}', '{{$prospecto->estado_actual}}', '{{$prospecto->nombre}}')">
                                        
                                        <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                    </a>

                                </span>

                             @else

                                <span class="badge">

                                    <a href="#">

                                        <i class="material-icons text-warning" style="font-size: 17px;">warning</i>

                                    </a>

                                    <a href="#" onclick="on_off('', '{{$prospecto->id}}', '{{$prospecto->estado_actual}}', '{{$prospecto->nombre}}')">

                                        <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                    </a>

                                </span>

                            @endif       

                                <a href="#">{{ $prospecto->nombre}}

                            </a>

                        </li>

                    @endforeach

                </ul>

            </div>

        <!-- ELEMENTOS DEL ESTADO CONTACTADOS -->

        <div class="col-md-15 panel-contenido">

            <ul class="list-group contacto">

                <li class="list-group-item titulos">

                    <h6 class="list-group-item-heading">

                        <i class="material-icons pull-right text-warning">label_important</i>

                        CONTACTADOS

                    </h6>

                </li>

                @foreach($contactados as $contacto)

                    <li id="{{ $contacto->id }}" name="{{ $contacto->nombre }}" class="list-group-item list-group-item-action">

                        <span class="badge">

                            @if($contacto->fecha_actualizado_difference()  < 3)

                                <a href="#" estado="estado">

                                    <i class="material-icons text-success" style="font-size: 17px;">check_circle</i>

                                </a>

                                <a href="#" estado="estado" onclick="on_off('', '{{$contacto->id}}', '{{$contacto->estado_actual}}', '{{$contacto->nombre}}')">
                                    
                                    <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                </a>

                             @else
                                <a href="#" class="estado">

                                    <i class="material-icons text-warning" style="font-size: 17px;">warning</i>

                                </a>

                                <a href="#" onclick="on_off('', '{{$contacto->id}}', '{{$contacto->estado_actual}}', '{{$contacto->nombre}}')">

                                    <i class="material-icons text-text-danger" style="font-size: 17px;">close</i>

                                </a>

                            @endif       

                    </span>

                            <a href="#">{{ $contacto->nombre}}

                            </a>

                    </li>

                @endforeach
                     
            </ul>

        </div>

        <!-- ELEMENTOS DEL ESTADO REUNIONES -->

        <div class="col-md-15 panel-contenido">

            <ul class="list-group reunion">

                <li class="list-group-item titulos">

                    <h6 class="list-group-item-heading">

                        <i class="material-icons pull-right text-warning">

                                label_important

                        </i>

                            REUNIONES

                    </h6>

                </li>

                @foreach($reuniones as $reunion)

                    <li id="{{ $reunion->id }}" name="{{ $reunion->nombre }}" class="list-group-item list-group-item-action">

                        @if($reunion->fecha_actualizado_difference()  < 3)

                             <span class="badge">

                                <a href="#">

                                    <i class="material-icons text-success" style="font-size: 17px;">check_circle</i>

                                </a>

                                <a href="#" onclick="on_off('', '{{$reunion->id}}', '{{$reunion->estado_actual}}', '{{$reunion->nombre}}')">
                                    
                                    <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                </a>

                            </span>

                         @else

                                <span class="badge">

                                    <a href="#">

                                        <i class="material-icons text-warning" style="font-size: 17px;">warning</i>

                                    </a>

                                    <a href="#" onclick="on_off('', '{{$reunion->id}}', '{{$reunion->estado_actual}}', '{{$reunion->nombre}}')">

                                        <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                    </a>

                                </span>

                        @endif       

                            <a href="#">{{ $reunion->nombre}}

                            </a>

                    </li>

                @endforeach

            </ul>

        </div>

        <!-- ELEMENTOS DEL ESTADO PROPUESTA -->

        <div class="col-md-15 panel-contenido">

            <ul class="list-group propuesta">

                <li class="list-group-item titulos">

                    <h6 class="list-group-item-heading">

                        <i class="material-icons pull-right text-warning">label_important</i>

                        PROPUESTAS

                    </h6>

                </li>

                @foreach($propuestas as $propuesta)
                    
                    <li id="{{ $propuesta->id }}" name="{{ $propuesta->nombre }}" class="list-group-item list-group-item-action">

                        @if($propuesta->fecha_actualizado_difference()  < 3)

                             <span class="badge">

                                <a href="#">

                                    <i class="material-icons text-success" style="font-size: 17px;">check_circle</i>

                                </a>

                                <a href="#" onclick="on_off('', '{{$propuesta->id}}', '{{$propuesta->estado_actual}}', '{{$propuesta->nombre}}')">
                                    
                                    <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                </a>

                            </span>

                         @else

                                <span class="badge">

                                    <a href="#">

                                        <i class="material-icons text-warning" style="font-size: 17px;">warning</i>

                                    </a>

                                    <a href="#" onclick="on_off('', '{{$propuesta->id}}', '{{$propuesta->estado_actual}}', '{{$propuesta->nombre}}')">

                                        <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                    </a>

                                </span>

                        @endif       

                            <a href="#">{{ $propuesta->nombre}}

                            </a>

                    </li>

                @endforeach

            </ul>

        </div>

            <!-- ELEMENTOS DEL ESTADO NEGOCIACIÓN -->

            <div class="col-md-15 panel-contenido">

                <ul class="list-group negociacion">

                    <li class="list-group-item titulos">

                        <h6 class="list-group-item-heading">

                            <i class="material-icons pull-right text-warning">label_important</i>

                            NEGOCIACIÓN

                        </h6>

                    </li>

                    @foreach($negociaciones as $negociacion)
            
                        <li id="{{ $negociacion->id }}" name="{{ $negociacion->nombre }}" class="list-group-item list-group-item-action">

                        @if($negociacion->fecha_actualizado_difference()  < 3)

                             <span class="badge">

                                <a href="#">

                                    <i class="material-icons text-success" style="font-size: 17px;">check_circle</i>

                                </a>

                                <a href="#" onclick="on_off('', '{{$negociacion->id}}', '{{$negociacion->estado_actual}}', '{{$negociacion->nombre}}')">
                                    
                                    <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                </a>

                            </span>

                         @else

                                <span class="badge">

                                    <a href="#">

                                        <i class="material-icons text-warning" style="font-size: 17px;">warning</i>

                                    </a>

                                    <a href="#" onclick="on_off('', '{{$negociacion->id}}', '{{$negociacion->estado_actual}}', '{{$negociacion->nombre}}')">

                                        <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                    </a>

                                </span>

                        @endif       

                            <a href="#">{{ $negociacion->nombre}}

                            </a>

                    </li>
                        
                    @endforeach

                </ul>

            </div>

        </div>

    </div>

</div>

@include('../organizaciones.modal_cambiar_estado')

@endsection

