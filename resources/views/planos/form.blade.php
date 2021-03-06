@extends('layouts.app')
@section('content')
<div class="card">
<div class="card-header"><h3>Plano</h3></div>
    <div class="card-body">
        <div class="row">

            <form method="POST" action="{{url($data['url'])}}">
                @if($data['method'] == 'PUT')
                    @method('PUT')
                @endif
                @csrf

                <div class="form-group">
                    <label for="nome">Data de Inicio</label>
                    <input type="date" name="plano[data_ini]" class="form-control" value="{{old('plano.data_ini', $data['plano'] ? $data['plano']->data_ini : '')}}" required>
                    <span>{{$errors->first('plano.data_ini')}}</span>
                </div>  

                <div class="form-group">
                    <label for="nome">Data de Fim</label>
                    <input type="date" name="plano[data_fim]" class="form-control" value="{{old('plano.data_fim', $data['plano'] ? $data['plano']->data_fim : '')}}" required>
                    <span>{{$errors->first('plano.data_fim')}}</span>
                </div>

                <div class="form-group">
                    <label for="nome">Tipo De Taxa</label>
                    <div class="input-group">
                        <select class="custom-select" name="plano[taxa_id]" id="form-control">
                        @foreach($data['taxas'] as $taxa)
                        <option value="{{$taxa->id}}">{{$taxa->nome}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome">Mensalista</label>
                    <div class="input-group">
                        <select class="custom-select" name="plano[mensalista_id]" id="form-control" >
                        @foreach($data['mensalistas'] as $mensalista)
                        <option value="{{$mensalista->id}}">{{$mensalista->nome}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                


                <input type="submit" value="{{$data['plano'] ? 'Atualizar' : 'Salvar'}}" class="btn btn-success">
            </form>
           
        </div>
    </div>

</div>
@stop