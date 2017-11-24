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
						{!! Form::open(['id' => 'formbuscar']) !!}
						 <!-- CAMPO SELECCIONA FILTRO DE BÚSQUEDA -->
	                    <div class="col-md-3 col-sm-12">
	                        <div class="form-group label-floating is-empty combo">
	                            {!! Form::select('type', ['T' => 'TODOS', 'R' => 'RUT', 'N' => 'NOMBRE', 'A' => 'APELLIDO'], null, ['id' => 'type','class' => 'selectpicker', 'data-style' => 'select-with-transition', 'title' => 'BUSCAR POR:']) !!}
	                        </div>
	                    </div>
	                    <!-- CAMPO BUSCAR -->
	                    <div class="col-md-3 col-sm-12">
	                        <div class="form-group label-floating is-empty">
	                            <label class="control-label"></label>
	                            {!! Form::text('buscar',null, ['id' => 'buscar','class' => 'form-control', 'required' ,'autocomplete' => 'off', 'placeholder' => 'Ingrese Búsqueda']); !!}
	                        </div>
	                    </div>
	                    <div class="col-md-2 col-sm-12">
	                        <div class="label-floating is-empty">
	                        	{!! Form::submit('Buscar',['class' => 'btn btn-primary']) !!}
	                        </div>
		                </div>
		                {!! Form::close() !!} 

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
			<div class="card-bootom">
	    		<div class="row">
	    			<div class="col-md-12">
						<div class="card-header" data-background-color="purple">
							<h4 class="card-title">DOCTORES</h4>
							<p class="category">Existen en total 5 doctores ingresados</p>
						</div>
						<div class="card-content table-responsive" id="div_lista">
							@component('doctores.list_doctor')
								@slot('personas', $personas)
							@endcomponent
						</div>
					</div>
	       		</div>
	       	</div>
		</div>
	</div>
</div>
@endsection

