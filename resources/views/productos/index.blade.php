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

                                <td>

                                    <h4 class="card-title">

                                        <small class="text-primary">PRODUCTOS</small>

                                    </h4>

                                </td>    

                                <td class="pull-right">

                                    <a href="#" onclick="mostrar_productos(0)" rel="tooltip" title="Agregar productos" class="btn btn-primary btn-round btn-fab btn-fab-mini">

                                        <i class="material-icons">add</i>

                                    </a>

                                </td>

                            </tr>

                        </table> 

                        @component('productos.list_productos')

                            @slot('productos')

                            @endslot

                        @endcomponent

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('productos.modal')

@endsection
