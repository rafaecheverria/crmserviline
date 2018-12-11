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
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-15 panel-contenido">
                <ul class="list-group prospecto">
                    <li href="#" class="list-group-item titulos">
                        <b><h6 class="list-group-item-heading"><i class="material-icons pull-right text-warning">label_important</i>PROSPECTOS </h6></b>
                    </li>
                    @foreach($prospectos as $prospecto)
                            @if(strlen($prospecto->nombre) > 26 )
                                <li id="{{ $prospecto->id }}" name="{{ $prospecto->nombre }}" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $prospecto->nombre }}">
                                    <a href="#">{{ substr($prospecto->nombre,0,26) }}...
                                    <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                                </a></li>
                            @else
                            <li id="{{ $prospecto->id }}" name="{{ $prospecto->nombre }}" class="list-group-item list-group-item-action">
                                <a href="#">{{ $prospecto->nombre}}
                                    <span class="color-estado">
                                        <div class="circulo" style="background: #5cb85c;"></div>
                                    </span>
                                </a>
                        </li>
                        @endif
                @endforeach
            </ul>
        </div>

        <div class="col-md-15 panel-contenido">
            <ul class="list-group contacto">
                <li class="list-group-item titulos">
                    <h6 class="list-group-item-heading"><i class="material-icons pull-right text-warning">label_important</i>CONTACTADOS</h6>
                </li>
                @foreach($contactados as $contacto)
                        @if(strlen($contacto->nombre) > 26 )
                            <li id="{{ $contacto->id }}" name="{{ $contacto->nombre }}" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $contacto->nombre }}">
                                <a href="#">{{ substr($contacto->nombre,0,26) }}...
                                    <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                                </a>
                            </li>
                            @else
                            <li id="{{ $contacto->id }}" name="{{ $contacto->nombre }}" class="list-group-item list-group-item-action">
                                <a href="#">{{ $contacto->nombre }}
                                    <span class="color-estado">
                                        <div class="circulo" style="background: #5cb85c;"></div>
                                    </span>
                                </a>
                            </li>
                        @endif
                @endforeach
                     
            </ul>
        </div>

        <div class="col-md-15 panel-contenido">
            <ul class="list-group reunion">
                <li class="list-group-item titulos">
                    <h6 class="list-group-item-heading"><i class="material-icons pull-right text-warning">label_important</i>REUNIONES</h6>
                </li>
                @foreach($reuniones as $reunion)
                        @if(strlen($reunion->nombre) > 26 )
                            <li id="{{ $reunion->id }}" name="{{ $reunion->nombre }}" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $reunion->nombre }}"><a href="#">{{ substr($reunion->nombre,0,26) }}...
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a></li>
                            @else
                            <li id="{{ $reunion->id }}" name="{{ $reunion->nombre }}" class="list-group-item list-group-item-action"><a href="#">{{ $reunion->nombre }}
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a></li>
                        @endif
                @endforeach
            </ul>
        </div>

        <div class="col-md-15 panel-contenido">
            <ul class="list-group propuesta">
                <li class="list-group-item titulos">
                    <h6 class="list-group-item-heading"><i class="material-icons pull-right text-warning">label_important</i>PROPUESTAS</h6>
                </li>
                @foreach($propuestas as $propuesta)
                    @if(strlen($propuesta->nombre) > 26 )
                        <li id="{{ $propuesta->id }}" name="{{ $propuesta->nombre }}" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $propuesta->nombre }}"><a href="#">{{ substr($propuesta->nombre,0,26) }}...
                            <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                        </a></li>
                        @else
                        <li  id="{{ $propuesta->id }}" name="{{ $propuesta->nombre }}" class="list-group-item list-group-item-action"><a href="#">{{ $propuesta->nombre }}
                            <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                        </a></li>
                    @endif
                @endforeach
            </ul>
        </div>

            <div class="col-md-15 panel-contenido">
                <ul class="list-group negociacion">
                    <li class="list-group-item titulos">
                        <h6 class="list-group-item-heading"><i class="material-icons pull-right text-warning">label_important</i>NEGOCIACIONES</h6>
                    </li>
                    @foreach($negociaciones as $negociacion)
                        @if(strlen($negociacion->nombre) > 26 )
                            <li id="{{ $negociacion->id }}" name="{{ $negociacion->nombre }}" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $negociacion->nombre }}"><a href="#">{{ substr($negociacion->nombre,0,26) }}...
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a></li>
                            @else
                            <li  id="{{ $negociacion->id }}" name="{{ $negociacion->nombre }}" class="list-group-item list-group-item-action"><a href="#">{{ $negociacion->nombre }}
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a></li>
                        @endif
                    @endforeach
                </ul>
            </div>

    </div>
    </div>
</div>
@include('../organizaciones.modal_cambiar_estado')
@endsection

