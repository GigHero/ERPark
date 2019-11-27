@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Mensalista</div>
        <div class="card-body">

            <form method="POST" action="{{url($data['url'])}} ">
                @if($data['method'] == 'PUT')
                    @method('PUT')
                @endif
                @csrf         
                <div class="row d-flex align-items-end">
                    <div class="form-group col-3">
                        <label for="nome">Data de Inicio</label>
                        <input type="datetime-local" name="relatorio[data_ini]" class="form-control" value="{{old('relatorio.data_ini', $data['relatorio'] ? $data['relatorio']->data_ini : '')}}">
                        <span>{{$errors->first('relatorio.data_ini')}}</span>
                    </div>

                    <div class="form-group col-3">
                        <label for="nome">Data de Fim</label>
                        <input type="datetime-local" name="relatorio[data_fim]" class="form-control" value="{{old('relatorio.data_fim', $data['relatorio'] ? $data['relatorio']->data_fim : '')}}">
                        <span>{{$errors->first('relatorio.data_fim')}}</span>
                    </div>

                    <div class="form-group col-3">
                        <input type="submit" value="{{$data['relatorio'] ? 'Atualizar' : 'Relatório'}}" class="btn btn-success float-left">
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

@stop