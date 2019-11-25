@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Patio</div>
        <div class="card-body">
            <div class="row pb-3 pl-3 pr-3 d-flex">
                <a class="mr-auto btn btn-success" href="{{url('patio/create')}}">Nova Entrada</a>

                <a class="btn btn-success " href="{{url('relatorios/')}}">Relatorios</a>
            </div> 
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Horario de entrada</th>
                            <th>Horario de Saida</th>
                            <th>Valor</th>
                            <th>Placa</th>
                            <th>Vaga</th>
                            <th colspan='3'class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($data['carros'] as $carro)
                        <tr>
                            <td>{{$carro->entrada}}</td>
                            <td>{{$carro->saida}}</td>
                            <td>{{$carro->getValor()}}</td>
                            <td>{{$carro->placa}}</td>
                            <td>{{$carro->vaga}}</td>
                            <td class="text-center">
                                <form action="{{url('patio/'.$carro->id)}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Saida" {{ $carro->getValor() ? 'disabled' : ' ' }}/>
                                </form>
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