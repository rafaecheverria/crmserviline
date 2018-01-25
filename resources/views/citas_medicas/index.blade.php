@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="header text-center">
        <h3 class="title">FullCalendar.io</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-calendar">
                <div class="card-content" class="ps-child">
                    <div id="citas_medicas"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('citas_medicas.addModalCita')
@include('citas_medicas.upModalCita')