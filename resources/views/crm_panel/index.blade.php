@extends('layouts.app')

@section('content')

<div class="content">

    <div class="row">

        <div class="col-md-12 cabecera_crm pull-right">

            <div class="card">

                <div class="card-content text-right">

                    <a href="#" onclick="organizacion_user(0,1)" rel="tooltip" title="Agregar organización" class="btn btn-primary btn-round btn-fab btn-fab-mini">
                                        <i class="material-icons">add</i>
                                    </a>

                </div>

            </div>

        </div>

    <!-- ELEMENTOS DEL ESTADO PROSPECTOS -->

    <div class="row">

        <div class="col-md-12">

            <div class="col-md-15 panel-contenido">

                <ul class="list-group prospecto" prospecto>

                    <li href="#" class="list-group-item titulos">

                        <b>

                            <h6 class="list-group-item-heading">

                                <i class="material-icons pull-right text-warning">label_important</i>

                                PROSPECTOS <br>

                                <small style="color: white;">

                                    Cantidad de Prospectos <span id="count-prospectos">({{ $prospectos->count() }})</span>

                                </small>

                            </h6>

                        </b>

                    </li>

                    @foreach($prospectos as $prospecto)

                        <li id="{{ $prospecto->id }}" name="{{ $prospecto->nombre }}" class="list-group-item list-group-item-action">

                            <span class="badge">

                                <div class="estado">

                                    @if($prospecto->fecha_actualizado_difference()  < 3)

                                        <a href="#">

                                            <i class="material-icons text-success" style="font-size: 17px;">check_circle</i>

                                        </a>

                                     @else

                                        <a href="#">

                                            <i class="material-icons text-warning" rel="tooltip" title="La empresa lleva mas de 3 días sin actividad" style="font-size: 17px;">warning</i>

                                        </a>

                                     @endif 

                                    <a href="#" onclick="on_off('', '{{$prospecto->id}}', '{{$prospecto->estado_actual}}', '{{$prospecto->nombre}}')">
                                        
                                        <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                    </a>

                                </div>

                            </span>    

                            <a href="#" onclick="ficha('{{$prospecto->id}}', 2)"><p class="text-muted">{{ str_limit($prospecto->nombre, $limit = 26, $end = '...') }}</p></a>

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

                            CONTACTADOS <br>

                            <small style="color: white;">

                                Cantidad de Contactados ({{ $contactados->count() }})

                            </small>

                    </h6>

                </li>

                @foreach($contactados as $contacto)

                    <li id="{{ $contacto->id }}" name="{{ $contacto->nombre }}" class="list-group-item list-group-item-action">

                             <span class="badge">

                                <div class="estado">

                                    @if($contacto->fecha_actualizado_difference()  < 3)

                                        <a href="#">

                                            <i class="material-icons text-success" style="font-size: 17px;">check_circle</i>

                                        </a>

                                     @else

                                        <a href="#">

                                            <i class="material-icons text-warning" rel="tooltip" title="La empresa lleva mas de 3 días sin actividad" style="font-size: 17px;">warning</i>

                                        </a>

                                     @endif 

                                    <a href="#" onclick="on_off('', '{{$contacto->id}}', '{{$contacto->estado_actual}}', '{{$contacto->nombre}}')">
                                        
                                        <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                    </a>

                                </div>

                            </span>                              

                            <a href="#" onclick="ficha('{{$contacto->id}}', 2)"><p class="text-muted">{{ str_limit($contacto->nombre, $limit = 26, $end = '...') }}</p></a>

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

                            REUNIONES <br>

                            <small style="color: white;">

                                Cantidad de Reuniones ({{ $reuniones->count() }})

                            </small>

                    </h6>

                </li>

                @foreach($reuniones as $reunion)

                    <li id="{{ $reunion->id }}" name="{{ $reunion->nombre }}" class="list-group-item list-group-item-action">

                             <span class="badge">

                                <div class="estado">

                                    @if($reunion->fecha_actualizado_difference()  < 3)

                                        <a href="#">

                                            <i class="material-icons text-success" style="font-size: 17px;">check_circle</i>

                                        </a>

                                     @else

                                        <a href="#">

                                            <i class="material-icons text-warning" rel="tooltip" title="La empresa lleva mas de 3 días sin actividad" style="font-size: 17px;">warning</i>

                                        </a>

                                     @endif 

                                    <a href="#" onclick="on_off('', '{{$reunion->id}}', '{{$reunion->estado_actual}}', '{{$reunion->nombre}}')">
                                        
                                        <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                    </a>

                                </div>

                            </span>                              

                            <a href="#" onclick="ficha('{{$reunion->id}}', 2)"><p class="text-muted">{{ str_limit($reunion->nombre, $limit = 26, $end = '...') }}</p></a>

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

                        PROPUESTAS </br>

                            <small style="color: white;">

                                Cantidad de Propuestas ({{ $propuestas->count() }})

                            </small>

                    </h6>

                </li>

                @foreach($propuestas as $propuesta)
                    
                    <li id="{{ $propuesta->id }}" name="{{ $propuesta->nombre }}" class="list-group-item list-group-item-action">

                             <span class="badge">

                                <div class="estado">

                                     @if($propuesta->fecha_actualizado_difference()  < 3) <!-- pregunta si han pasado 3 dias desde la ultima actualizacion de estado de la empresa -->

                                        <a href="#">

                                            <i class="material-icons text-success" style="font-size: 17px;">check_circle</i>

                                        </a>

                                    @else

                                        <a href="#">

                                            <i class="material-icons text-warning" rel="tooltip" title="La empresa lleva mas de 3 días sin actividad" style="font-size: 17px;">warning</i>

                                        </a>

                                    @endif    

                                        <a href="#" onclick="on_off('', '{{$propuesta->id}}', '{{$propuesta->estado_actual}}', '{{$propuesta->nombre}}')">
                                            
                                            <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                        </a>

                                </div>

                            </span>                        

                            <a href="#" onclick="ficha('{{$propuesta->id}}', 2)"><p class="text-muted">{{ str_limit($propuesta->nombre, $limit = 26, $end = '...') }}</p></a>

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

                            NEGOCIACIÓN </br>

                            <small style="color: white;">

                                Cantidad de negociación ({{ $negociaciones->count() }})

                            </small>

                        </h6>

                    </li>

                    @foreach($negociaciones as $negociacion)
            
                        <li id="{{ $negociacion->id }}" name="{{ $negociacion->nombre }}" class="list-group-item list-group-item-action">

                             <span class="badge">

                                <div class="estado">

                                    <a href="#" onclick="mostrar_cambiar_estado('{{$negociacion->id}}', '{{$negociacion->nombre}}')">
                                        
                                        <i class="material-icons text-primary" style="font-size: 17px;">label</i>

                                    </a>

                                     @if($negociacion->fecha_actualizado_difference()  < 3)

                                        <a href="#">

                                            <i class="material-icons text-success" style="font-size: 17px;">check</i>

                                        </a>

                                    @else

                                        <a href="#">

                                            <i class="material-icons text-warning" rel="tooltip" title="La empresa lleva mas de 3 días sin actividad" style="font-size: 17px;">warning</i>

                                        </a>

                                    @endif


                                    <a href="#" onclick="on_off('', '{{$negociacion->id}}', '{{$negociacion->estado_actual}}', '{{$negociacion->nombre}}')">
                                        
                                        <i class="material-icons text-danger" style="font-size: 17px;">close</i>

                                    </a>

                                </div>

                            </span>                             

                            <a href="#" onclick="ficha('{{$negociacion->id}}', 2)"><p class="text-muted">{{ str_limit($negociacion->nombre, $limit = 21, $end = '...') }}</p></a>

                        </li>
                        
                    @endforeach

                </ul>

            </div>

        </div>

    </div>

</div>

@include('../organizaciones.modal')

@include('../contactos.modal')

@include('../cargos.modal')

@include('../organizaciones.modal_cambiar_estado')

@include('../organizaciones.modal_ficha')

@include('../organizaciones.modal_historial')

@include('../organizaciones.modal_estado')

@include('../organizaciones.modal_cambiar_estado')

@endsection

