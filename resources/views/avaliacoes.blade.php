@extends('layout.app', ["current"=>"avaliacoes"])
@section('body')
    @section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Avaliações</h5>
       
        <table class="table table-ordered table-hover" id="tabelaAvalicoes">
                
            <thead>
              <tr>
                <th>Nome</th>
                <th>Cpf</th>
                <th>Cidade/UF</th>
                <th>Agente</th>
                <th>Resumo</th>
              </tr>
            </thead>
            <tbody>
            
             </tbody>
          </table>
    </div>
    <div class="card-footer">
        <a href="{{asset('/cidades/excel')}}" class="btn btn-sm btn-success" role="button">Gerar Excel</a>
    </div>


@endsection

@section('javascript')
    <script type="text/javascript">
   
$.ajaxSetup({
  headers:{
  'X-CSRF-TOKEN':"{{csrf_token()}}"
  }
});

  
    function montarLinha(a) {

      var  linha = "<tr>"+
        "<td>"+a.nome_agente+"</td>"+
        "<td>"+a.cpf_agente+"</td>"+
        "<td>"+a.descricao_cidade+ "/" + a.descricao_uf +"</td>"+
        "<td>"+tipoAgente(a.tipoAgente)+"</td>"+
        "<td>"+
          '<button class="btn btn-xs btn-primary botoes" onclick="exibir('+a.id+')">Editar</button>'+
          "</td>"+
        "</tr>";

        return linha;
    }
/*********EXIBIR AVALIAÇÃO*********/

    function exibir(id){
        
        $.getJSON('/api/avaliacoes/'+id , function(data){
          console.log(data);

          /*$('#id').val(data.id);
          $('#descricao_cidade').val(data.descricao_cidade);
          $('#uf_id').val(data.uf_id);
          $('#dlgCidades').modal('show');*/
        });
       }

      /******LISTAR CIDADES*********/
      
       function listarAvaliacoes (){

      $.getJSON('/api/avaliacoes' , function(avaliacoes){

        for( i = 0; i < avaliacoes.length; i++){
     
       linha = montarLinha(avaliacoes[i])
       $('#tabelaAvalicoes>tbody').append(linha);
      }
      });
    }

 /****************UTILS****************/

 function tipoAgente(tipo){
    
    if(tipo == 1){
      return "ACS";
    }else{
      return "ACE";
    }
   }

/*********AUTO LOAD**********/

    $(function () {
     
      listarAvaliacoes();
      })
    </script>
@endsection

