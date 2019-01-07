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

                                        <small class="text-primary">CATEGORIAS</small>

                                    </h4>

                                </td>    

                                <td class="pull-right">

                                    <a href="#" onclick="mostrar_categoria(0)" rel="tooltip" title="Agregar organización" class="btn btn-primary btn-round btn-fab btn-fab-mini">

                                        <i class="material-icons">add</i>

                                    </a>

                                </td>

                            </tr>

                        </table> 

                        @component('categorias.list_categorias')

                            @slot('categorias')

                            @endslot

                        @endcomponent

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include('categorias.modal')

@endsection
