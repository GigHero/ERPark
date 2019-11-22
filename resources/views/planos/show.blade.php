@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Planos</div>
        <div class="card-body">     
                    <div class="row pb-3 pl-3">
                        <a class="btn btn-success" href="{{url('planos/create')}}">Criar Plano</a>
                    </div> 
            <div class="row pb-3 pl-3 d-flex justify-content-center">
            </div>
            <div class="row">
                <table class="table text-center table-striped">
                    <thead>
                        <tr>
                            <th><h5>ID</h5></th>
                            <th><h5>Inicio</h5></th>
                            <th><h5>Fim</h5></th>
                            <th><h5></h5></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data['planos'] as $plano)
                            <tr>
                                <td></td>
                                <td>{{$plano->data_inicio}}</td>
                                <td>{{$plano->data_fim}}</td>
                                <td></td>
                                
                                <td></td>
                                <td class="text-center">
                                    <a class="btn btn-success" href="{{url('planos/'.$plano->id)}}">Ver Planos</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop