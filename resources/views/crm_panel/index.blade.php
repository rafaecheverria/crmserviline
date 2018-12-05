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
                <div class="list-group">
                    <span href="#" class="list-group-item titulos">
                        <b><h6 class="list-group-item-heading"><i class="material-icons pull-right text-warning">label_important</i>PROSPECTOS </h6></b>
                    </span>
                    @foreach($prospectos as $prospecto)
                        <div class="prospecto">
                            @if(strlen($prospecto->nombre) > 26 )
                                <a href="#" id="{{ $prospecto->id }}" name="{{ $prospecto->nombre }}" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $prospecto->nombre }}">{{ substr($prospecto->nombre,0,26) }}...
                                    <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                                </a>
                            @else
                            <a href="#" id="{{ $prospecto->id }}" name="{{ $prospecto->nombre }}" class="list-group-item list-group-item-action">{{ $prospecto->nombre }}
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-15 panel-contenido">
            <div class="list-group">
                <span href="#" class="list-group-item titulos">
                    <h6 class="list-group-item-heading"><i class="material-icons pull-right text-warning">label_important</i>CONTACTADOS</h6>
                </span>
                
                @foreach($contactados as $contacto)
                    <div class="contacto">
                        @if(strlen($contacto->nombre) > 26 )
                            <a href="#" id="{{ $contacto->id }}" name="{{ $contacto->nombre }}" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $contacto->nombre }}">{{ substr($contacto->nombre,0,26) }}...
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                            @else
                            <a href="#" id="{{ $contacto->id }}" name="{{ $contacto->nombre }}" class="list-group-item list-group-item-action">{{ $contacto->nombre }}
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-15 panel-contenido">
            <div class="list-group">
                <span href="#" class="list-group-item titulos">
                    <h6 class="list-group-item-heading"><i class="material-icons pull-right text-warning">label_important</i>REUNIONES</h6>
                </span>
                @foreach($reuniones as $reunion)
                    <div class="reunion">
                        @if(strlen($reunion->nombre) > 26 )
                            <a href="#" id="{{ $reunion->id }}" name="{{ $reunion->nombre }}" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $reunion->nombre }}">{{ substr($reunion->nombre,0,26) }}...
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                            @else
                            <a href="#" id="{{ $reunion->id }}" name="{{ $reunion->nombre }}" class="list-group-item list-group-item-action">{{ $reunion->nombre }}
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-15 panel-contenido">
            <div class="list-group">
                <span href="#" class="list-group-item titulos">
                    <h6 class="list-group-item-heading"><i class="material-icons pull-right text-warning">label_important</i>PROPUESTAS</h6>
                </span>
                @foreach($propuestas as $propuesta)
                    <div class="propuesta">
                    @if(strlen($propuesta->nombre) > 26 )
                        <a href="#" id="{{ $propuesta->id }}" name="{{ $propuesta->nombre }}" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $propuesta->nombre }}">{{ substr($propuesta->nombre,0,26) }}...
                            <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                        </a>
                        @else
                        <a href="#" id="{{ $propuesta->id }}" name="{{ $propuesta->nombre }}" class="list-group-item list-group-item-action">{{ $propuesta->nombre }}
                            <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                        </a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

            <div class="col-md-15 panel-contenido">
                <div class="list-group">
                    <span href="#" class="list-group-item titulos">
                        <h6 class="list-group-item-heading"><i class="material-icons pull-right text-warning">label_important</i>NEGOCIACIONES</h6>
                    </span>
                    @foreach($negociaciones as $negociacion)
                        <div class="negociacion">
                        @if(strlen($negociacion->nombre) > 26 )
                            <a href="#" id="{{ $negociacion->id }}" name="{{ $negociacion->nombre }}" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $negociacion->nombre }}">{{ substr($negociacion->nombre,0,26) }}...
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                            @else
                            <a href="#" id="{{ $negociacion->id }}" name="{{ $negociacion->nombre }}" class="list-group-item list-group-item-action">{{ $negociacion->nombre }}
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('../organizaciones.modal_cambiar_estado')
@endsection

