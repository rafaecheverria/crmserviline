@extends('layouts.app')

@section('content')
@include('roles/modal_agregar')
@include('roles/modal_editar')
@include('roles/modal_eliminar')
@include('roles/modal_permisos')
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
								<td><h4 class="card-title"><small>LISTA DE ROLES</small></h4></td>         
								<td class="pull-right"><a href="#" data-toggle="modal" data-target="#modal_agregar_rol" rel="tooltip" title="Agregar rol" class="btn btn-success btn-round btn-fab btn-fab-mini">
                                        <i class="material-icons">add</i>
                                    </a>
                                </td>
							</tr>
						</table>	
						@component('roles.list_roles')
							@slot('roles')
							@endslot
						@endcomponent
					</div>
				</div>
       		</div>
		</div>
	</div>
</div>
@endsection
