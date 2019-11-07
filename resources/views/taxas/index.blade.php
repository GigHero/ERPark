@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Taxas</div>
        <div class="card-body">
            <div class="row pb-3 pl-3">
                <a class="btn btn-success" href="{{url('taxas/create')}}">Criar Taxa</a>
            </div> 
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th colspan='3'class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($taxas as $taxa)
                            <tr>
                                <td>{{$taxa->nome}}</td>
                                <td>{{$taxa->valor}}</td>
                                <td class="text-center"><a href="{{url('taxas/'.$taxa->id.'/edit')}}" class="btn btn-warning">Editar</td>
                                <td class="text-center">
                                    <form action="{{url('taxas/'.$taxa->id)}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                            <input type="submit" class="btn btn-danger" value="Desativar"/>
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