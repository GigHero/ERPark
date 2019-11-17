@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Patio</div>
        <div class="card-body">
            <div class="row pb-3 pl-3">
                <a class="btn btn-success" href="{{url('patio/create')}}">Nova Entrada</a>
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
            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop