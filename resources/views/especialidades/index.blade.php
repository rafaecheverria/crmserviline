@extends('layouts.app')

@section('content')
@include('especialidades/modal_eliminar')
<div class="content">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-7">
        		<div class="card">
					<div class="card-header card-header-icon" data-background-color="green">
						 <i class="material-icons">assignment</i>
					</div>
					<div class="card-content">	
						<h4 class="card-title"><small>LISTA DE ESPECIALIDADES</small></h4>
						@component('especialidades.list_especialidades')
							@slot('especialidades')
							@endslot
						@endcomponent
					</div>
				</div>
       		</div>
       		<div class="col-md-5">
        		<div class="card">
					<div class="card-header card-header-icon" data-background-color="orange">
						 <i class="material-icons">portrait</i>
					</div>
					<div class="card-content">	
						<h4 class="card-title"><small>FORMULARIO ESPECIALIDADES</small></h4>
						<form id="form_especialidades">
							<input type="text" name="id" id="id" hidden="true">
							<div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">NOMBRE ESPECIALIDAD</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control"/>
                                </div>
               					<table>
               						<tr>
               							<td id="btn-guardar"><a href="#"  onClick="guardar_especialidad();" class="btn btn-fill btn-success">Guardar</a></td>
               							<td><a href="#" id="limpiar" type="submit" class="btn btn-fill btn-warning">Limpiar</a></td>
               						</tr>
               					</table>
                            </div>
						</form>
					</div>
				</div>
       		</div>
		</div>
	</div>
</div>
@endsection
