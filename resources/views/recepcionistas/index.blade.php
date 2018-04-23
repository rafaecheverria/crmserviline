@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
        		<div class="card">
					<div class="card-header card-header-icon" data-background-color="green">
						 <i class="material-icons">assignment</i>
					</div>
					<div class="card-content">
						<table id="top-button-add">
							<tr>
								<td><h4 class="card-title"><small>LISTA DE RECEPCIONISTAS</small></h4></td>         
								<td class="pull-right"><a href="#" data-toggle="modal" data-target="#modal_agregar_recepcionista" rel="tooltip" title="Agregar recepcionista" class="btn btn-success btn-round btn-fab btn-fab-mini">
                                        <i class="material-icons">add</i>
                                    </a>
                                </td>
							</tr>
						</table>	
						@component('recepcionistas.list_recepcionist')
							@slot('recepcionistas')
							@endslot
						@endcomponent
					</div>
				</div>
       		</div>
		</div>
	</div>
</div>
@include('recepcionistas.modal_agregar')
@include('recepcionistas.modal_editar')
@include('recepcionistas.modal_eliminar')
@include('../clave.usuarios')
@endsection

