@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="card">
			<div class="row">
				<div class="col-md-4 col-md-offset-8 col-sm-12">
	                <div class="col-md-12 col-sm-12">

	                	<a href="{{url('admin/doctores/create')}}" class="btn btn-success">
	                		<i class="material-icons">add</i>
		                    <span>Agragar</span>
		                </a>
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
			<div class="card-bootom">
	    		<div class="row">
	    			<div class="col-md-12">
						<div class="card-header" data-background-color="purple">
							<h4 class="card-title">DOCTORES</h4>
							<p class="category">Existen en total 5 doctores ingresados</p>
						</div>
						<div class="card-content" id="div_lista">
							@component('doctores.list_doctor')
								@slot('personas')
								@endslot
							@endcomponent
						</div>
					</div>
	       		</div>
	       	</div>
		</div>
	</div>
</div>
@endsection

