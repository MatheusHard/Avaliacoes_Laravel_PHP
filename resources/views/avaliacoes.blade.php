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
</div>

<!--*****************DIALOG RESUMO*****************-->

<div class="modal" tabindex="-1" role="dialog" id="dlgAvaliacoes">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
  <form class="form-horizontal" id="formCidades">
    <div class="modal-header">
      <h5 class="modal-title">Resumo Avaliação</h5>
    </div>
    <div class="modal-body">
      <div class="form-group">
                <h1>Conteudo Teórico</h1><br>
                <h3>Aplicação no Processo de trabalho:</h3>  
              <div class="form-check">
              <input class="form-check-input" type="checkbox"  value="radioSim_1" id="radioSim_1" disabled>
              <label class="form-check-label">Proporcionou novos conhecimentos</label><br>
              <input class="form-check-input" type="checkbox"  value="radioNao_1" id="radioNao_1" disabled>
              <label class="form-check-label">Não me proporcionou conhecimento do que já possuia</label><br>
          </div>

          <div class="form-check">
              <input class="form-check-input" type="checkbox"  value="radioSim_1" id="radioMuito_2" disabled>
              <label class="form-check-label" id="muito()"></label><br>
              <input class="form-check-input" type="checkbox"  value="radioNao_1" id="radiobom_2" disabled>
              <label class="form-check-label">Bom</label><br>
              <input class="form-check-input" type="checkbox"  value="radioSim_1" id="radioRegular_2" disabled>
              <label class="form-check-label">Regular</label><br>
              <input class="form-check-input" type="checkbox"  value="radioNao_1" id="radioRuim_2" disabled>
              <label class="form-check-label">Ruim</label><br>
          </div>
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
          '<button class="btn btn-xs btn-primary botoes" onclick="exibir('+a.id+')">Resumo</button>'+
          "</td>"+
        "</tr>";

        return linha;
    }
/*********EXIBIR AVALIAÇÃO*********/

    function exibir(id){
        
        $.getJSON('/api/avaliacoes/'+id, function(data){
        
                  
        checkedFalse();
          
         if(data[0].radioSim_1 == 1){$("#radioSim_1").attr('checked', true);}
         if(data[0].radioNao_1 == 1){$("#radioNao_1").attr('checked', true);}
        
         if(data[0].radioMuito_2 == 1){$("#radioMuito_2").attr('checked', true);}
         if(data[0].radiobom_2 == 1){$("#radiobom_2").attr('checked', true);}
         if(data[0].radioRegular_2 == 1){$("#radioRegular_2").attr('checked', true);}
         if(data[0].radioRuim_2 == 1){$("#radioRuim_2").attr('checked', true);}
       
         if(data[0].radioSeguro_3 == 1){$("#radioSeguro_3").attr('checked', true);}
         if(data[0].radioPoucoSeguro_3 == 1){$("#radioPoucoSeguro_3").attr('checked', true);}
         if(data[0].radioInseguro_3 == 1){$("#radioInseguro_3").attr('checked', true);}

         if(data[0].radioExcessiva_4 == 1){$("#radioExcessiva_4").attr('checked', true);}
         if(data[0].radioRazoavel_4 == 1){$("#radioRazoavel_4").attr('checked', true);}
         if(data[0].radioInsuficiente_4 == 1){$("#radioInsuficiente_4").attr('checked', true);}
           
         if(data[0].radioMuito_5 == 1){$("#radioMuito_5").attr('checked', true);}
         if(data[0].radiobom_5 == 1){$("#radiobom_5").attr('checked', true);}
         if(data[0].radioRegular_5 == 1){$("#radioRegular_5").attr('checked', true);}
         if(data[0].radioRuim_5 == 1){$("#radioRuim_5").attr('checked', true);}

         if(data[0].radioMuito_6 == 1){$("#radioMuito_6").attr('checked', true);}
         if(data[0].radiobom_6 == 1){$("#radiobom_6").attr('checked', true);}
         if(data[0].radioRegular_6 == 1){$("#radioRegular_6").attr('checked', true);}
         if(data[0].radioRuim_6 == 1){$("#radioRuim_6").attr('checked', true);}

         if(data[0].radioMuito_7 == 1){$("#radioMuito_7").attr('checked', true);}
         if(data[0].radiobom_7 == 1){$("#radiobom_7").attr('checked', true);}
         if(data[0].radioRegular_7 == 1){$("#radioRegular_7").attr('checked', true);}
         if(data[0].radioRuim_7 == 1){$("#radioRuim_7").attr('checked', true);}
      
         if(data[0].radioMuito_8 == 1){$("#radioMuito_8").attr('checked', true);}
         if(data[0].radiobom_8 == 1){$("#radiobom_8").attr('checked', true);}
         if(data[0].radioRegular_8 == 1){$("#radioRegular_8").attr('checked', true);}
         if(data[0].radioRuim_8 == 1){$("#radioRuim_8").attr('checked', true);}


         if(data[0].radioMuito_9 == 1){$("#radioMuito_9").attr('checked', true);}
         if(data[0].radiobom_9 == 1){$("#radiobom_9").attr('checked', true);}
         if(data[0].radioRegular_9 == 1){$("#radioRegular_9").attr('checked', true);}
         if(data[0].radioRuim_9 == 1){$("#radioRuim_9").attr('checked', true);}
        
         if(data[0].radioMuito_10 == 1){$("#radioMuito_10").attr('checked', true);}
         if(data[0].radiobom_10 == 1){$("#radiobom_10").attr('checked', true);}
         if(data[0].radioRegular_10 == 1){$("#radioRegular_10").attr('checked', true);}
         if(data[0].radioRuim_10 == 1){$("#radioRuim_10").attr('checked', true);}
        
         if(data[0].descricao == 1){$("#descricao").attr('checked', true);}
         if(data[0].nome_agente == 1){$("#nome_agente").attr('checked', true);}
         if(data[0].tipo_agente == 1){$("#tipo_agente").attr('checked', true);}

        $('#dlgAvaliacoes').modal('show');
        });
       }

      /******LISTAR CIDADES*********/
      
       function listarAvaliacoes (){

      $.getJSON('/api/avaliacoes', function(avaliacoes){

        for( i = 0; i < avaliacoes.length; i++){
     
       linha = montarLinha(avaliacoes[i])
       $('#tabelaAvalicoes>tbody').append(linha);
      }
      });
    }

 /****************UTILS****************/

function checkedFalse(){
          
          $("#radioSim_1").attr('checked', false);
          $("#radioNao_1").attr('checked', false);

          $("#radioMuito_2").attr('checked', false);
          $("#radiobom_2").attr('checked', false);
          $("#radioRegular_2").attr('checked', false);
          $("#radioRuim_2").attr('checked', false);
       
         /* $("#radioSeguro_3").attr('checked', false);
          $("#radioPoucoSeguro_3").attr('checked', false);
          $("#radioInseguro_3").attr('checked', false);

          $("#radioExcessiva_4").attr('checked', false);
          $("#radioRazoavel_4").attr('checked', false);
          $("#radioInsuficiente_4").attr('checked', false);
           
          $("#radioMuito_5").attr('checked', false);
          $("#radiobom_5").attr('checked', false);
          $("#radioRegular_5").attr('checked', false);
          $("#radioRuim_5").attr('checked', false);

          $("#radioMuito_6").attr('checked', false);
          $("#radiobom_6").attr('checked', false);
          $("#radioRegular_6").attr('checked', false);
          $("#radioRuim_6").attr('checked', false);

          $("#radioMuito_7").attr('checked', false);
          $("#radiobom_7").attr('checked', false);}
          $("#radioRegular_7").attr('checked', false);
          $("#radioRuim_7").attr('checked', false);
      
          $("#radioMuito_8").attr('checked', false);
          $("#radiobom_8").attr('checked', false);
          $("#radioRegular_8").attr('checked', false);
          $("#radioRuim_8").attr('checked', false);


          $("#radioMuito_9").attr('checked', false);
          $("#radiobom_9").attr('checked', false);
          $("#radioRegular_9").attr('checked', false);
          $("#radioRuim_9").attr('checked', false);

          $("#radioMuito_10").attr('checked', false);
          $("#radiobom_10").attr('checked', false);
          $("#radioRegular_10").attr('checked', false);
          $("#radioRuim_10").attr('checked', false);
        
          $("#descricao").attr('checked', false);
          $("#nome_agente").attr('checked', false);
          $("#tipo_agente").attr('checked', false);*/

        }

 function tipoAgente(tipo){
    
    if(tipo == 1){
      return "ACS";
    }else{
      return "ACE";
    }
   }

   function muito(){
     return "Muito Bom";
   }
   function bom(){
     return "Bom";
   }
   function regular(){
     return "Regular";
   }
   function ruim(){
     return "Ruim";
   }

/*********AUTO LOAD**********/

    $(function () {
     
      listarAvaliacoes();
      })
    </script>
@endsection

