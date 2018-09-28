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
                                <td><h4 class="card-title"><small>LISTA DE CONTACTOS</small></h4></td>         
                                <td class="pull-right"><a href="#" data-toggle="modal" data-target="#modal_contacto" rel="tooltip" title="Agregar contacto" class="btn btn-info btn-round btn-fab btn-fab-mini">
                                        <i class="material-icons">add</i>
                                    </a>
                                </td>
                            </tr>
                        </table>    
                        @component('contactos.list_contactos')
                            @slot('contactos')
                            @endslot
                        @endcomponent
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@include('contactos.modal_ficha')
@include('contactos.modal_expediente')
@include('contactos.modal')
@include('../cargos.modal')
@endsection
