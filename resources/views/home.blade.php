@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Painel</div>
    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-4 d-flex justify-content-center">
            
                <a class="text-body" href="{{url('patio')}}">
                    <i class="material-icons sombra" style="font-size:370px;">
                        directions_car
                    </i>
                </a>
            </div>

            <div class="col-md-6 mb-4 d-flex justify-content-center">
            
                <a class="text-body" href="{{url('taxas')}}">
                    <i class="material-icons sombra" style="font-size:370px;">
                        sync_alt
                    </i>
                </a>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                
                <a class="text-body" href="{{url('planos')}}">
                    <i class="material-icons sombra" style="font-size:370px;">
                        face
                    </i>
                </a>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                
                <a class="text-body" href="{{url('mensalistas')}}">
                    <i class="material-icons sombra" style="font-size:370px;">
                        people
                    </i>
                </a>
            </div>
        </div>
    </div>
</div>
@stop