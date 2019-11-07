@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Editar Taxa</div>
    <div class="card-body">
        <div class="row">

            <form method="POST" action="{{url($data['url'])}}">
                @if($data['method'] == 'PUT')
                    @method('PUT')
                @endif
                @csrf
                <div class="form-group">
                    <label for="Nome">Nome</label>
                    <input type="text" name="taxa[nome]" class="form-control" value="{{old('taxa.nome', $data['taxa'] ? $data['taxa']->nome : '')}}">
                    <span>{{$errors->first('taxa.nome')}}</span>
                </div>
                <div class="form-group">
                    <label for="Valor">Valor</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" name="taxa[valor]"class="form-control" value="{{old('taxa.valor', $data['taxa'] ? $data['taxa']->valor : '')}}">
                        <span>{{$errors->first('taxa.valor')}}</span>
                    </div>
                </div>

                <input type="submit" value="{{$data['taxa'] ? 'Atualizar' : 'Salvar'}}" class="btn btn-success">
            </form>
           
        </div>
    </div>
</div>
@stop