@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
    	<div class="row">
            	<div class="card">
					<div class="card-content">
						<div class="col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating is-empty combo">
                                        <select class="selectpicker" data-style="select-with-transition" multiple title="Choose City" data-size="7">
                                            <option disabled> Choose city</option>
                                            <option value="2">Paris </option>
                                            <option value="3">Bucharest</option>
                                            <option value="4">Rome</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" placeholder=".col-md-4">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group label-floating is-empty">
                                        <button class="btn btn-info">Info</button>
                                    </div>
                                </div>
                            </div>
                        </div>
	    	</div>
    	</div>
        <div class="row">
        	<div class="col-md-12">
        		<div class="card">
					<div class="card-header" data-background-color="purple">
						<h4 class="card-title">DOCTORES</h4>
						<p class="category">Existen en total 5 doctores ingresados</p>
					</div>
					<div class="card-content table-responsive">
						<table class="table">
							<thead class="text-danger">
								<th>Rut</th>
								<th>Nombre</th>
								<th>Apellidos</th>
								<th>Dirección</th>
								<th>Teléfono</th>
								<th>Email</th>
								<th colspan="3">Acciones</th>
							</thead>
							<tbody>
								@foreach($personas as $persona)
								<tr>
									<td>{{ $persona->rut }}</td>
									<td>{{ $persona->name }}</td>
									<td>{{ $persona->last_name }}</td>
									<td>{{ $persona->address }}</td>
									<td>{{ $persona->phone }}</td>
									<td>{{ $persona->email }}</td>
									@permission('edit_users')
									<td>Editar</td>
									@endpermission
									<td>Eliminar</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
       		</div>
    	</div>
	</div>
</div>
@endsection

