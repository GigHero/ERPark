@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Mensalista</div>
        <div class="card-body">
            <div class="row pb-3 pl-3">
                <a class="btn btn-success" href="{{url('mensalistas/create')}}">Criar Mensalista</a>
            </div> 
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th colspan='3'class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data['mensalistas'] as $mensalista)
                            <tr>
                                <td>{{$mensalista->nome}}</td>
                                <td>{{$mensalista->email}}</td>
                                <td class="text-center"><a href="{{url('mensalistas/'.$mensalista->id.'/edit')}}" class="btn btn-warning">Editar</td>
                                <td class="text-center">
                                    <form action="{{url('mensalistas/'.$mensalista->id)}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                            <input type="submit" class="btn btn-danger" value="Desativar"/>
                                    </form>
                                </td>
                                <td class="text-center"><a href="{{url('planos/'.$mensalista->id.'/')}}" class="btn btn-info">Planos</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop