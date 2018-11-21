@extends('layouts.app')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">

             
                <div class="col-md-15 well well-sm">
                    <div class="list-group">
                        @foreach($prospectos as $prospecto)
                        <a href="#" class="list-group-item">
                            <h6 class="list-group-item-heading">{{ $prospecto->nombre }}</h6>
                            <p class="list-group-item-text">List Group Item Text</p>
                             
                        </a>
                        @endforeach
                    </div>
                </div>
           


            <div class="col-md-15 well well-sm">
                    <div class="list-group">
                        @foreach($contactados as $contactado)
                        <a href="#" class="list-group-item">
                            <h6 class="list-group-item-heading">{{ $contactado->nombre }}</h6>
                            <p class="list-group-item-text">List Group Item Text</p>
                             
                        </a>
                        @endforeach
                    </div>
                </div>
            <div class="col-md-15 well well-sm">
               <div class="list-group">
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">First List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">Second List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="#" class="list-group-item">
                            <h6 class="list-group-item-heading">Third List Group Item Heading</h6>
                            <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                     <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">Second List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                     <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">Second List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                     <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">Second List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">Second List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">Second List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">Second List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">Second List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">Second List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    
          </div>
            </div>
            <div class="col-md-15 well well-sm">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">First List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">Second List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="#" class="list-group-item">
                            <h6 class="list-group-item-heading">Third List Group Item Heading</h6>
                            <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                     <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">Second List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                     <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Second List Group Item Heading</h4>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                     <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Second List Group Item Heading</h4>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>

          </div>
            </div>
            <div class="col-md-15 well well-sm">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <h6 class="list-group-item-heading">First List Group Item Heading</h6>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Second List Group Item Heading</h4>
                        <p class="list-group-item-text">List Group Item Text</p>
                    </a>
                    <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Third List Group Item Heading</h4>
                            <p class="list-group-item-text">List Group Item Text</p>
                    </a>

          </div>
            </div>

        </div>
    </div>
</div>

@endsection

