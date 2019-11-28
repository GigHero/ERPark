@extends('layouts.app')
@section('content')
<div class="card" id="print">
    <div class="card-header">Mensalista</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th><button id='botao' class="imprimir-button btn btn-primary" id="btn"><i class="material-icons">print </i></button></th>
                    </tr>   
                </thead>
                <tbody>
                    @foreach($data['pesquisas'] as $pesquisa)
                        <tr>
                            <td>{{$pesquisa->entrada}}</td>
                            <td>{{$pesquisa->saida}}</td>
                            <td>
                            {{$pesquisa->getValor()}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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