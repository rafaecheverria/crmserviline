@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                         <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <table id="top-button-add">
                            <tr>
                                <td><h4 class="card-title"><small>ORGANIZACIONES / EMPRESAS</small></h4></td>         
                                <td class="pull-right"><a href="#" onclick="organizacion_user(0,1)" rel="tooltip" title="Agregar organización" class="btn btn-info btn-round btn-fab btn-fab-mini">
                                        <i class="material-icons">add</i>
                                    </a>
                                </td>
                            </tr>
                        </table>    
                        @component('organizaciones.list_organizaciones')
                            @slot('organizaciones')
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('organizaciones.modal')
@include('../contactos.modal')
@include('../cargos.modal')
@include('organizaciones.modal_ficha')
@include('organizaciones.modal_estado')
@endsection
