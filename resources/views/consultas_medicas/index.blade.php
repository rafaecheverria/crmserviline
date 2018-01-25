@extends('layouts.app')

@section('content')
    <div class="content">
    	<div class="container-fluid">
    	    <div class="row">
    	        <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-text" data-background-color="orange">
                             <h4 class="card-title">Pacientes</h4>
                             <p class="category">Lista de pacientes pendientes por atender</p>
                        </div>
                        <div class="card-content">
                            @component('consultas_medicas.list_pendientes')
                                @slot('consultas_medicas')
                                @endslot
                            @endcomponent
                        </div>
                    </div>
    	        </div>
    	    </div>
    	</div>
    </div>
@endsection