<!--<table class="table">
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

-->
<table id="datatables" class="table table-striped table-no-bordered table-hover table-responsive" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th class="disabled-sorting text-right">Actions</th>
        </tr>
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
            <td class="text-right">
                <a href="#" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">favorite</i></a>
                <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>