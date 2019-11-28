@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Planos</div>
        <div class="card-body">     
                    <div class="row pb-2 pl-4 pr-4">
                        <a class="mr-auto btn btn-success" href="{{url('planos/create')}}">Criar Plano</a>
                        
                        <button id='botao' class="imprimir-button btn btn-primary" id="btn"><i class="material-icons">print </i></button>
                    </div> 
            <div class="row pb-3 pl-3 d-flex justify-content-center">
            </div>
            <div class="row" id="print">
                <table class="table text-center table-striped">
                    <thead>
                        <tr>
                            <th><h5>Data de Criação</h5></th>
                            <th><h5>Inicio</h5></th>
                            <th><h5>Termino</h5></th>
                            <th><h5>Valor</h5></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data['planos'] as $plano)
                            <tr>
                                <td>{{$plano->created_at}}</td>
                                <td>{{$plano->data_inicio}}</td>
                                <td>{{$plano->data_fim}}</td>
                                <td>{{$plano->taxa->valor}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script src="{{asset('js/printThis.js')}}"></script>

<script>
    $(document).on('click','.imprimir-button', function(){
        
        $("#print").printThis();

    })
</script>
@endsection