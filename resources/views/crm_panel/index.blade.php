@extends('layouts.app')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-15 well well-sm">
                <div class="list-group">    
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">PROSPECTO</h6>
                    </a>
                </div>
                <div class="list-group">
                    @foreach($prospectos as $prospecto)
                        
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">{{ $prospecto->nombre }}</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                         
                    </a>
                      
                    @endforeach
                </div>
            </div>
            <div class="col-md-15 well well-sm">
                <div class="list-group">    
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">CONTACTADOS</h6>
                    </a>
                </div>
                <div class="list-group">
                    @foreach($contactados as $contacto)
                        
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">{{ $contacto->nombre }}</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                         
                    </a>
                      
                    @endforeach
                </div>
            </div>

           <div class="col-md-15 well well-sm">
                <div class="list-group">    
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">REUNIONES</h6>
                    </a>
                </div>
                <div class="list-group">
                    @foreach($reuniones as $reunion)
                        
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">{{ $reunion->nombre }}</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                         
                    </a>
                      
                    @endforeach
                </div>
            </div>

            <div class="col-md-15 well well-sm">
                <div class="list-group">    
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">PROPUESTAS</h6>
                    </a>
                </div>
                <div class="list-group">
                    @foreach($propuestas as $propuesta)
                        
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">{{ $propuesta->nombre }}</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                         
                    </a>
                      
                    @endforeach
                </div>
            </div>

            <div class="col-md-15 well well-sm">
                <div class="list-group">    
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">NEGOCIACIÓN</h6>
                    </a>
                </div>
                <div class="list-group">
                    @foreach($negociciones as $negociacion)
                        
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">{{ $negociacion->nombre }}</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                         
                    </a>
                      
                    @endforeach
                </div>
            </div>
          
      

        </div>
    </div>
</div>

@endsection

