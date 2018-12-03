@extends('layouts.app')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-15 panel-contenido">
                <div class="list-group">
                    <span href="#" class="list-group-item titulos-panel">
                        <h6 class="list-group-item-heading">PROSPECTOS</h6>
                    </span>
                    @foreach($prospectos as $prospecto)
                        @if(strlen($prospecto->nombre) > 26 )
                            <a href="#" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $prospecto->nombre }}">{{ substr($prospecto->nombre,0,26) }}...
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                            @else
                            <a href="#" class="list-group-item list-group-item-action">{{ $prospecto->nombre }}
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                        @endif
                    @endforeach
              </div>
          </div>

            <div class="col-md-15 panel-contenido">          
                 <div class="list-group">
                    <span href="#" class="list-group-item titulos-panel">
                        <h6 class="list-group-item-heading">CONTACTADOS</h6>
                    </span>
                    @foreach($contactados as $contacto)
                        @if(strlen($contacto->nombre) > 26 )
                            <a href="#" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $contacto->nombre }}">{{ substr($contacto->nombre,0,26) }}...
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                            @else
                            <a href="#" class="list-group-item list-group-item-action">{{ $contacto->nombre }}
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                        @endif
                    @endforeach
              </div>
            </div>

           <div class="col-md-15 panel-contenido">
                <div class="list-group">
                    <span href="#" class="list-group-item titulos-panel">
                        <h6 class="list-group-item-heading">REUNIONES</h6>
                    </span>
                    @foreach($reuniones as $reunion)
                        @if(strlen($reunion->nombre) > 26 )
                            <a href="#" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $reunion->nombre }}">{{ substr($reunion->nombre,0,26) }}...
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                            @else
                            <a href="#" class="list-group-item list-group-item-action">{{ $reunion->nombre }}
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col-md-15 panel-contenido">
                <div class="list-group">
                    <span href="#" class="list-group-item titulos-panel">
                        <h6 class="list-group-item-heading">PROPUESTAS</h6>
                    </span>
                    @foreach($propuestas as $propuesta)
                        @if(strlen($propuesta->nombre) > 26 )
                            <a href="#" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $propuesta->nombre }}">{{ substr($propuesta->nombre,0,26) }}...
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                            @else
                            <a href="#" class="list-group-item list-group-item-action">{{ $propuesta->nombre }}
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                        @endif
                    @endforeach
              </div>
            </div>

            <div class="col-md-15 panel-contenido">
                <div class="list-group">
                    <span href="#" class="list-group-item titulos-panel">
                        <h6 class="list-group-item-heading">NEGOCIACIONES</h6>
                    </span>
                    @foreach($negociaciones as $negociacion)
                        @if(strlen($negociacion->nombre) > 26 )
                            <a href="#" class="list-group-item list-group-item-action" rel="tooltip" data-placement="rigth" title="{{ $negociacion->nombre }}">{{ substr($negociacion->nombre,0,26) }}...
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                            @else
                            <a href="#" class="list-group-item list-group-item-action">{{ $negociacion->nombre }}
                                <span class="color-estado"><div class="circulo" style="background: #5cb85c;"></div></span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

