@extends('layout.app',["current"=>"cidades"])


@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title"> Cadastro de Cidades</h5>
       
        <table class="table table-ordered table-hover">
                
            <thead>
              <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>UF</th>
                <th>Actions</th>
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
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" role="button" onclick="novaCidade()">Nova Cidade</button>
        <a href="{{asset('/cidades/excel')}}" class="btn btn-sm btn-success" role="button">Gerar Excel</a>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="dlgCidades">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
<form class="form-horizontal" id="formCidades">
  <div class="modal-header">
    <h5 class="modal-title">Nova Cidade</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="id" class="form-control">
    <div class="form-group">
        <label for="descricao_cidade" class="control-label">Cidade</label>
        <div class="input-group">
            <input type="text" class="form-control" id="descricao_cidade" placeholder="Nome da Cidade">
        </div>
    </div>

    
    
    <div class="form-group">
      <label for="uf_id" class="control-label">Categoria</label>
        <div class="input-group">
           <select id="inputState" class="form-control" name="uf_id" id="uf_id">
        @foreach ($arrayUfs as $uf)   
            <option value="{{$uf->id}}">{{$uf->descricao_uf}}</option>
        @endforeach
            </select>
          </div>
      </div>
    </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
  </div>
</form>

    </div>
  </div>


</div>

@endsection

@section('javascript')
    <script type="text/javascript">
    function novaCidade(){
      $('#id').val('');
      $('#descricaoCidade').val('');
      $('#uf_id').val('');
      $('#dlgCidades').modal('show');
    }
    </script>
@endsection

