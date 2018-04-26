@extends('layouts.app')

@section('content')
<div class="content">
	<div class="container-fluid">
	    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon pull-right" data-background-color="blue">
                        <i class="material-icons">assignment_ind</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Historial de Consultas</h4>
                        <div class="row">
                            <div class="col-md-2">
                                <ul class="nav nav-pills nav-pills-icons nav-pills-info nav-stacked" role="tablist">
                                    <li class="active">
                                        <a href="#dashboard-2" role="tab" data-toggle="tab">
                                            <i class="material-icons">query_builder</i> Pendientes
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#schedule-2" role="tab" data-toggle="tab">
                                            <i class="material-icons">check_circle</i> Atenididas
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-10">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="dashboard-2">
                                        <div class="tab-pane active" id="dashboard-2">
                                            @component('consultas_medicas.list_pendientes')
                                                @slot('consultas_medicas')
                                                @endslot
                                            @endcomponent
                                        </div>
                                    </div>
                                        <div class="tab-pane" id="schedule-2">
                                            @component('consultas_medicas.list_atendidos')
                                                @slot('consultas_medicas')
                                                @endslot
                                            @endcomponent
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>       
	    </div>
	</div>
</div>
@include('consultas_medicas.modal_atender')
@include('consultas_medicas.modal_ver')
@include('consultas_medicas.updateCitaPendiente')
@include('consultas_medicas.modal_pago')
@endsection