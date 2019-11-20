@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><h3>Entrada de Veículos</h3></div>
    <div class="card-body">
        <div class="row">

            <form method="POST" action="{{url($data['url'])}}">
                @if($data['method'] == 'PUT')
                    @method('PUT')
                @endif
                @csrf

                <div class="form-group">
                    <label for="nome">Placa</label>
                    <input type="text" name="patio[placa]" class="form-control" value="{{old('patio.placa', $data['patio'] ? $data['patio']->placa : '')}}">
                    <span>{{$errors->first('patio.placa')}}</span>
                </div>

                <div class="form-group">
                    <label for="nome">Observação</label>
                    <input type="text" name="patio[obs]" class="form-control" placeholder="Avaria na traseira" value="{{old('patio.obs', $data['patio'] ? $data['patio']->obs : '')}}">
                    <span>{{$errors->first('patio.obs')}}</span>
                </div>  

                <div class="form-group">
                    <label for="nome">Vaga</label>
                    <input type="text" name="patio[vaga]" class="form-control" placeholder="F12" value="{{old('patio.vaga', $data['patio'] ? $data['patio']->vaga : '')}}">
                    <span>{{$errors->first('patio.vaga')}}</span>
                </div>

                <div class="form-group">
                    <label for="nome">Tipo De Taxa</label>
                    <div class="input-group">
                        <select class="custom-select" name="patio[taxa_id]" id="form-control">
                        @foreach($data['taxas'] as $taxa)
                        <option value=" ">Selecionar Taxa</option>
                        <option value="{{$taxa->id}}">{{$taxa->nome}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                

                <input type="submit" value="{{$data['patio'] ? 'Atualizar' : 'Salvar'}}" class="btn btn-success">
            </form>
           
        </div>
    </div>
</div>
@stop