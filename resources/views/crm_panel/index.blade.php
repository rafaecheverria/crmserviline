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

                            <a href="#">{{ $prospecto->nombre}}

                                <span class="color-estado">

                                    @if($prospecto->fecha_actualizado_difference()  < 3)

                                        <div class="circulo" style="background: #5cb85c;"></div>  

                                     @else

                                        <div class="circulo" style="background: red;"></div>      


                                    @endif        

                                </span>

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

                        <a href="#">{{ $contacto->nombre }}

                            <span class="color-estado">

                               @if($contacto->fecha_actualizado_difference()  < 3)

                                    <div class="circulo" style="background: #5cb85c;"></div>  

                                @else

                                    <div class="circulo" style="background: red;"></div>      

                                @endif 

                            </span>

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
                        <a href="#">

                            {{ $reunion->nombre }}
                           
                            <span class="color-estado">

                                @if($reunion->fecha_actualizado_difference()  < 3)

                                    <div class="circulo" style="background: #5cb85c;"></div>  

                                @else

                                    <div class="circulo" style="background: red;"></div>      

                                @endif 

                            </span>

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
        
                    <li  id="{{ $propuesta->id }}" name="{{ $propuesta->nombre }}" class="list-group-item list-group-item-action">

                        <a href="#">

                                    
                            {{ $propuesta->nombre }}

                            <span class="color-estado">

                                @if($propuesta->fecha_actualizado_difference() < 3)

                                    <div class="circulo" style="background: #5cb85c;"></div>  

                                 @else

                                    <div class="circulo" style="background: red;"></div>      


                                 @endif                  
                           
                            </span>

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
            
                        <li  id="{{ $negociacion->id }}" name="{{ $negociacion->nombre }}" class="list-group-item list-group-item-action recuperaIconos">

                            <a href="#">

                                @if(strlen($negociacion->nombre) > 26 )

                                    {{ substr($negociacion->nombre,0,26) }}...

                                @else

                                     {{ $negociacion->nombre }}

                                @endif

                                <span class="color-estado">

                                    @if($negociacion->fecha_actualizado_difference() < 3)

                                        <div class="circulo" style="background: #5cb85c;"></div> <a href="#" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>

                                     @else

                                        <div class="circulo" style="background: red;"></div> <a href="#" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>     


                                 @endif        

                                </span>

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

