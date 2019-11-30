@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Planos</div>
        <div class="card-body">     
                    <div class="row pb-3 pl-3">
                        <a class="btn btn-success" href="{{url('planos/create')}}">Criar Plano</a>
                    </div> 
            <div class="row pb-3 pl-3 d-flex justify-content-center">
                <div class="input-group mb-3 col-6">
                    
                </div>
            </div>
            <div class="row">
                <table class="table text-center table-striped">
                    <thead>
                        <tr>
                            <th><h5>ID</h5></th>
                            <th><h5>NOME</h5></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data['mensalistas'] as $mensalista)
                            <tr>
                                <td>{{$mensalista->nome}}</td>
                                <td>{{$mensalista->email}}</td>
                                
                                <td class="text-center">
                                    <a class="btn btn-success" href="{{url('planos/'.$mensalista->id)}}">Ver Planos</a>
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