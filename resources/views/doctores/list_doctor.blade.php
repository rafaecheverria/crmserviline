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
<?php
		$currentPage = $personas->currentPage(); //Página actual
        $maxPages = $currentPage + 3; //Máxima numeración de páginas
        $firstPage = 1; //primera página
        $lastPage = $personas->lastPage(); //última página
        $nextPage = $currentPage+1; //Siguiente página
        $forwardPage = $currentPage-1; //Página anterior
        $personas->setPath('');
   ?>
<ul class="pagination">
        <!-- Botón para navegar a la primera página -->
        <li class="@if($currentPage==$firstPage){{'disabled'}}@endif">
                <a href="@if($currentPage>1){{$personas->url($firstPage)}}@else{{'#'}}@endif" class='btn'>Inicio</a>
        </li>
        <!-- Botón para navegar a la página anterior -->
        <li class="@if($currentPage==$firstPage){{'disabled'}}@endif">
                <a href="@if($currentPage>1){{$personas->url($forwardPage)}}@else{{'#'}}@endif" class='btn'>«</a>
        </li>
        <!-- Mostrar la numeración de páginas, partiendo de la página actual hasta el máximo definido en $maxPages -->
        @for($x=$currentPage;$x<$maxPages;$x++)
                @if($x <= $lastPage)
                <li class="@if($x==$currentPage){{'active'}}@endif">
                        <a href="{{$personas->url($x)}}" class='btn'>{{$x}}</a>
                </li>
                @endif
        @endfor
        <!-- Botón para navegar a la pagina siguiente -->
        <li class="@if($currentPage==$lastPage){{'disabled'}}@endif">
                <a href="@if($currentPage<$lastPage){{$personas->url($nextPage)}}@else{{'#'}}@endif" class='btn'>»</a>
        </li>
        <!-- Botón para navegar a la última página -->
        <li class="@if($currentPage==$lastPage){{'disabled'}}@endif">
                <a href="@if($currentPage<$lastPage){{$personas->url($lastPage)}}@else{{'#'}}@endif" class='btn'>Fin</a>
        </li>
</ul>