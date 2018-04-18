@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
    	<div class="row">

    		<div class="col-md-12">
        		<div class="card">
					<div class="card-header card-header-icon" data-background-color="blue">
						 <i class="material-icons">assignment</i>
					</div>

					<div class="card-content">
						<table id="top-button-add">
							<tr>
								<td><h4 class="card-title"><small>LISTA DE PACIENTES</small></h4></td>         
								<td class="pull-right"><a href="#" data-toggle="modal" data-target="#modal_agregar_paciente" rel="tooltip" title="Agregar paciente" class="btn btn-info btn-round btn-fab btn-fab-mini">
                                        <i class="material-icons">add</i>
                                    </a>
                                </td>
							</tr>
						</table>	
						@component('pacientes.list_pacientes')
							@slot('pacientes')
							@endslot
						@endcomponent
					</div>
				</div>

       		</div>

		</div>
	</div>
</div>
@include('pacientes.modal_ficha')
@include('pacientes.modal_editar')
@include('pacientes.modal_agregar')
@include('pacientes.modal_expediente')
@endsection
