@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><h3>Mensalista</h3></div>
    <div class="card-body">
        <div class="row">

            <form method="POST" action="{{url($data['url'])}}">
                @if($data['method'] == 'PUT')
                    @method('PUT')
                @endif
                @csrf

                <div class="form-group">
                    <label for="nome">Data de Inicio</label>
                    <input type="text" name="patio[data_ini]" class="form-control" placeholder="04/10/2019" value="{{old('patio.data_ini', $data['patio'] ? $data['patio']->data_ini : '')}}">
                    <span>{{$errors->first('patio.data_ini')}}</span>
                </div>

                <div class="form-group">
                    <label for="nome">Data de Fim</label>
                    <input type="text" name="patio[data_fim]" class="form-control" placeholder="05/11/2019" value="{{old('patio.data_fim', $data['patio'] ? $data['patio']->data_fim : '')}}">
                    <span>{{$errors->first('patio.data_fim')}}</span>
                </div>

                <div class="form-group">
                    <label for="nome">Valor</label>
                    <input type="number" name="patio[valor]" class="form-control" placeholder="15.63" value="{{old('patio.valor', $data['patio'] ? $data['patio']->valor : '')}}">
                    <span>{{$errors->first('patio.valor')}}</span>
                </div>

                
                <input type="submit" value="{{$data['patio'] ? 'Atualizar' : 'Salvar'}}" class="btn btn-success">
            </form>
           
        </div>
    </div>
</div>
@stop