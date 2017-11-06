@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        	<div class="col-md-12">
        		<div class="card">
					<div class="card-header" data-background-color="purple">
						<h4 class="card-title">Table Title</h4>
						<p class="category">Here is a subtitle for this table</p>
					</div>
					<div class="card-content table-responsive table-full-width">
						<table class="table">
							<thead class="text-danger">
								<th>Id</th>
								<th>Name</th>
								<th>Email</th>
								<th colspan="3">Acciones</th>
							</thead>
							<tbody>
								@foreach($personas as $persona)
								<tr>
									<td>{{ $persona->id }}</td>
									<td>{{ $persona->name }}</td>
									<td>{{ $persona->email }}</td>
									<td>Editar</td>
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