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

                
                <input type="submit" value="{{$data['mensalista'] ? 'Atualizar' : 'Salvar'}}" class="btn btn-success">
            </form>
           
        </div>
    </div>
</div>
@stop