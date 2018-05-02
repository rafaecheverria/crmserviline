@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
        		<div class="card">
					<div class="card-header card-header-icon" data-background-color="red">
						 <i class="material-icons">assignment</i>
					</div>
					<div class="card-content">
						<table id="top-button-add">
							<tr>
								<td><h4 class="card-title"><small>LISTA DE DOCTORES</small></h4></td>         
								<td class="pull-right"><a href="#" data-toggle="modal" data-target="#modal_agregar_doctor" rel="tooltip" title="Agregar doctor" class="btn btn-danger btn-round btn-fab btn-fab-mini">
                                        <i class="material-icons">add</i>
                                    </a>
                                </td>
							</tr>
						</table>	
						@component('doctores.list_doctor')
							@slot('doctores')
							@endslot
						@endcomponent
					</div>
				</div>
       		</div>
		</div>
	</div>
</div>
@include('doctores.modal_especialidades')
@include('doctores.modal_editar')
@include('doctores.modal_agregar')
@include('doctores.modal_dias')
@include('doctores.modal_form_dias')
@include('../clave.usuarios')
@endsection

