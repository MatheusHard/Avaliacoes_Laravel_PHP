@extends('layout.app', ["current"=>"cidades"])

@section('body')
    
<div class="card border">
    <div class="card-body">
        <form action="/cidades" method="POST">
        @csrf
        <div class="form-group">
            <label for="descricao_cidade">Cidade: </label>
            <input class="form-control" type="text" name="descricao_cidade" id="descricao_cidade" placeholder="nome cidade">
            <label for="uf_id">UF: </label>
           
            <select id="inputState" class="form-control" name="uf_id" id="uf_id">
        @foreach ($arrayUfs as $uf)   
            <option value="{{$uf->id}}">{{$uf->descricao_uf}}</option>
        @endforeach
           </select>
    </div>
        <button type="submit" class="btn btn-primary btn-sm" value="Cadastrar">Cadastrar</button>
        <button type="cancel" class="btn btn-danger btn-sm" value="Cancelar">Cancelar</button>

        </form>
    </div>
</div>
@endsection