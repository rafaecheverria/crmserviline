@extends('layouts.app')

@section('content')
@include('pacientes.modal')
<div class="content">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-9">
        		<div class="card">
					<div class="card-header card-header-icon" data-background-color="blue">
						 <i class="material-icons">assignment</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Lista de usuarios</h4>
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
@endsection