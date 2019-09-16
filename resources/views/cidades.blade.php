@extends('layout.app',["current"=>"cidades"])
@section('body')
<div class="card border">
    <div class="card-body">
        <h5>Cadastro de Cidades</h5>
       
    @if (count($arrayCidades) > 0)
        <table class="table table-hover">
                
            <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Descrição</th>
                <th scope="col">UF</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                    @foreach ($arrayCidades as $c)
                <tr>
                 <th scope="row">{{$c->id}}</th>
                  <td>{{$c->descricao_cidade}}</td>
                  <td>{{$c->descricao_uf}}</td>
                  
                  <td>
                   <a href="/cidades/editar/{{$c->id}}" class="btn btn-sm btn-primary">Editar</a>
                  <a href="/cidades/apagar/{{$c->id}}" class="btn btn-sm btn-danger">Deletar</a>
                 </td>
               </tr>
                    @endforeach
             </tbody>
          </table>
    @endif
    </div>
    <div class="card-footer">
        <a href="/cidades/novo" class="btn btn-sm btn-primary" role="button">Nova Cidade</a>
        <a href="{{asset('/cidades/excel')}}" class="btn btn-sm btn-success" role="button">Gerar Excel</a>
    
      </div>
</div>

@endsection

