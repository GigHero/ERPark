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
                    <label for="nome">Nome</label>
                    <input type="text" name="mensalista[nome]" class="form-control" placeholder="Rogério" value="{{old('mensalista.nome', $data['mensalista'] ? $data['mensalista']->nome : '')}}">
                    <span>{{$errors->first('mensalista.nome')}}</span>
                </div>

                <div class="form-group">
                    <label for="CPF">CPF</label>
                    <input type="text" name="mensalista[cpf]" class="form-control" placeholder="7x4.x46.x50-4x" value="{{old('mensalista.cpf', $data['mensalista'] ? $data['mensalista']->cpf : '')}}">
                    <span>{{$errors->first('mensalista.cpf')}}</span>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="mensalista[email]" class="form-control" placeholder="name@example.com" value="{{old('mensalista.email', $data['mensalista'] ? $data['mensalista']->email : '')}}">
                    <span>{{$errors->first('mensalista.email')}}</span>
                </div>

                <div class="form-group">
                    <label for="Telefone">Telefone</label>
                    <input type="text" name="mensalista[telefone]" class="form-control" placeholder="12 99xxx- xx89" value="{{old('mensalista.telefone', $data['mensalista'] ? $data['mensalista']->telefone : '')}}">
                    <span>{{$errors->first('mensalista.telefone')}}</span>
                </div>

                <input type="submit" value="{{$data['mensalista'] ? 'Atualizar' : 'Salvar'}}" class="btn btn-success">
            </form>
           
        </div>
    </div>
</div>
@stop