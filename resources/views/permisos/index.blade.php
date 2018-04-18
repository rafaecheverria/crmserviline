@extends('layouts.app')

@section('content')
@include('permisos/modal_agregar')
@include('permisos/modal_editar')
@include('permisos/modal_eliminar')
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
								<td><h4 class="card-title"><small>LISTA DE PERMISOS</small></h4></td>         
								<td class="pull-right"><a href="#" data-toggle="modal" data-target="#modal_agregar_permiso" rel="tooltip" title="Agregar permiso" class="btn btn-success btn-round btn-fab btn-fab-mini">
                                        <i class="material-icons">add</i>
                                    </a>
                                </td>
							</tr>
						</table>	
						@component('permisos.list_permisos')
							@slot('permisos')
							@endslot
						@endcomponent
					</div>
				</div>
       		</div>
		</div>
	</div>
</div>
@endsection
