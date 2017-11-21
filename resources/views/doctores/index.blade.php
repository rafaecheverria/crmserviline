@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="card">
        	<div class="card-header card-header-icon" data-background-color="purple">
				<i class="material-icons">search</i>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="card-content">
	                    <div class="col-md-3 col-sm-12">
	                        <div class="form-group label-floating is-empty combo">
	                            <select class="selectpicker" data-style="select-with-transition" multiple title="Choose City" data-size="7">
	                                <option disabled> Choose city</option>
	                                <option value="2">Paris </option>
	                                <option value="3">Bucharest</option>
	                                <option value="4">Rome</option>
	                            </select>
	                        </div>
	                    </div>
	                    <div class="col-md-3 col-sm-12">
	                        <div class="form-group label-floating is-empty">
	                            <label class="control-label"></label>
	                            <input type="text" class="form-control" placeholder=".col-md-4">
	                        </div>
	                    </div>
	                    <div class="col-md-2 col-sm-12">
	                        <div class="label-floating is-empty">
	                            <button class="btn btn-info"><i class="material-icons">search</i>Buscar</button>
	                        </div>
		                </div>
		                <div class="col-md-4 col-sm-12">
		                	<button class="btn btn-success"><i class="material-icons">add</i>Agregar</button>
		                	<span class="dropdown">
								<button href="#" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="true" >
								<i class="material-icons">save</i>
						    	Exportar
						    	<b class="caret"></b>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Excel</a></li>
								<li><a href="#">Pdf</a></li>
							</ul>
							</span>
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
					<div class="card-content">
                        <ul class="pagination pagination-primary">
                            <li>
                                <a href="javascript:void(0);">1</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">...</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">5</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">6</a>
                            </li>
                            <li class="active">
                                <a href="javascript:void(0);">7</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">8</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">9</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">...</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">12</a>
                            </li>
                        </ul>
                    </div>
	       		</div>
			</div>
		</div>
	</div>
</div>
@endsection

