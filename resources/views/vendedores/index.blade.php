@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                         <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <table id="top-button-add">
                            <tr>
                                <td><h4 class="card-title"><small class="text-primary">LISTA DE VENDEDORES</small></h4></td>         
                                <td class="pull-right"><a href="#" onclick="mostrar_contacto(0,2)" rel="tooltip" title="Agregar vendedor" class="btn btn-primary btn-round btn-fab btn-fab-mini">
                                        <i class="material-icons">add</i>
                                    </a>
                                </td>
                            </tr>
                        </table>    
                        @component('vendedores.list_vendedores')
                            @slot('vendedores')
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('vendedores.modal_ficha')
@include('vendedores.modal')
@endsection
