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
                <th>Profissional</th>
                <th>Resumo</th>
              </tr>
            </thead>
            <tbody>
            
             </tbody>
          </table>
    </div>
    <div class="card-footer">
      <div class="float-left">

        <form class="form-horizontal" id="formAvaliacoes">
          
          <div class="modal-body">
         
            <div class="form-group">
              <label for="estados" class="control-label">Cidades</label>
                <div class="input-group">
                   <select class="form-control" id="id_cidade">
               
                    </select>
                  </div>
              </div>

           
             <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </div>
        </form>
    </div>
  </div>
</div>
<div id="piechart_3d" style="width: 900px; height: 500px;"></div>

<!--************************************DIALOG RESUMO************************************-->

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
              <input class="form-check-input" type="radio"  value="radioSim_1" id="radioSim_1" disabled>
              <label class="form-check-label">Proporcionou novos conhecimentos</label><br>
              <input class="form-check-input" type="radio"  value="radioNao_1" id="radioNao_1" disabled>
              <label class="form-check-label">Não me proporcionou conhecimento do que já possuia</label><br>
          </div>
          <br>
          <h1>Conteudo Prático</h1><br>
          <h3>Clareza/facilidade de trabalho:</h3>  
          <div class="form-check">
              <input class="form-check-input" type="radio"  value="radioSim_1" id="radioMuito_2" disabled>
              <label class="form-check-label">Muito Bom</label><br>
              <input class="form-check-input" type="radio"  value="radioNao_1" id="radiobom_2" disabled>
              <label class="form-check-label">Bom</label><br>
              <input class="form-check-input" type="radio"  value="radioSim_1" id="radioRegular_2" disabled>
              <label class="form-check-label">Regular</label><br>
              <input class="form-check-input" type="radio"  value="radioNao_1" id="radioRuim_2" disabled>
              <label class="form-check-label">Ruim</label><br>
          </div>

          <h3>Aplicação do processo de trabalho:</h3>  
          <div class="form-check">
              <input class="form-check-input" type="radio"  value="radioSeguro_3" id="radioSeguro_3" disabled>
              <label class="form-check-label">Estou seguro(a) para a utilização em campo</label><br>
              <input class="form-check-input" type="radio"  value="radioPoucoSeguro_3" id="radioPoucoSeguro_3" disabled>
              <label class="form-check-label">Estou pouco seguro(a) para a utilização em campo</label><br>
              <input class="form-check-input" type="radio"  value="radioInseguro_3" id="radioInseguro_3" disabled>
              <label class="form-check-label">Estou inseguro(a) para a utilização em campo</label><br>
      </div>
      
      <h3>Carga Horária:</h3>  
          <div class="form-check">
              <input class="form-check-input" type="radio"  value="radioExcessiva_4" id="radioExcessiva_4" disabled>
              <label class="form-check-label">Excessiva</label><br>
              <input class="form-check-input" type="radio"  value="radioRazoavel_4" id="radioRazoavel_4" disabled>
              <label class="form-check-label">Razoável</label><br>
              <input class="form-check-input" type="radio"  value="radioInsuficiente_4" id="radioInsuficiente_4" disabled>
              <label class="form-check-label">Insuficiente</label><br>
         
      </div>
      <h1>Instrutor</h1><br>
      <h3>Conhecimento do conteúdo:</h3>  
      <div class="form-check">
          <input class="form-check-input" type="radio"  value="radioMuito_5" id="radioMuito_5" disabled>
          <label class="form-check-label">Muito Bom</label><br>
          <input class="form-check-input" type="radio"  value="radiobom_5" id="radiobom_5" disabled>
          <label class="form-check-label">Bom</label><br>
          <input class="form-check-input" type="radio"  value="radioRegular_5" id="radioRegular_5" disabled>
          <label class="form-check-label">Regular</label><br>
          <input class="form-check-input" type="radio"  value="radioRuim_5" id="radioRuim_5" disabled>
          <label class="form-check-label">Ruim</label><br>
      </div>
      <h3>Clareza na exposição:</h3>  
      <div class="form-check">
          <input class="form-check-input" type="radio"  value="radioMuito_6" id="radioMuito_6" disabled>
          <label class="form-check-label">Muito Bom</label><br>
          <input class="form-check-input" type="radio"  value="radiobom_6" id="radiobom_6" disabled>
          <label class="form-check-label">Bom</label><br>
          <input class="form-check-input" type="radio"  value="radioRegular_6" id="radioRegular_6" disabled>
          <label class="form-check-label">Regular</label><br>
          <input class="form-check-input" type="radio"  value="radioRuim_6" id="radioRuim_6" disabled>
          <label class="form-check-label">Ruim</label><br>
      </div>
      <h3>Disponibilidade para exclarecer dúvidas:</h3>  
      <div class="form-check">
          <input class="form-check-input" type="radio"  value="radioMuito_7" id="radioMuito_7" disabled>
          <label class="form-check-label">Muito Bom</label><br>
          <input class="form-check-input" type="radio"  value="radiobom_7" id="radiobom_7" disabled>
          <label class="form-check-label">Bom</label><br>
          <input class="form-check-input" type="radio"  value="radioRegular_7" id="radioRegular_7" disabled>
          <label class="form-check-label">Regular</label><br>
          <input class="form-check-input" type="radio"  value="radioRuim_7" id="radioRuim_7" disabled>
          <label class="form-check-label">Ruim</label><br>
      </div>

      <h1>Equipe de apoio</h1><br>

      <h3>Conhecimento do conteúdo:</h3>  
      <div class="form-check">
          <input class="form-check-input" type="radio"  value="radioMuito_8" id="radioMuito_8" disabled>
          <label class="form-check-label">Muito Bom</label><br>
          <input class="form-check-input" type="radio"  value="radiobom_8" id="radiobom_8" disabled>
          <label class="form-check-label">Bom</label><br>
          <input class="form-check-input" type="radio"  value="radioRegular_8" id="radioRegular_8" disabled>
          <label class="form-check-label">Regular</label><br>
          <input class="form-check-input" type="radio"  value="radioRuim_8" id="radioRuim_8" disabled>
          <label class="form-check-label">Ruim</label><br>
      </div>
      <h3>Clareza na exposição:</h3>  
      <div class="form-check">
          <input class="form-check-input" type="radio"  value="radioMuito_9" id="radioMuito_9" disabled>
          <label class="form-check-label">Muito Bom</label><br>
          <input class="form-check-input" type="radio"  value="radiobom_9" id="radiobom_9" disabled>
          <label class="form-check-label">Bom</label><br>
          <input class="form-check-input" type="radio"  value="radioRegular_9" id="radioRegular_9" disabled>
          <label class="form-check-label">Regular</label><br>
          <input class="form-check-input" type="radio"  value="radioRuim_9" id="radioRuim_9" disabled>
          <label class="form-check-label">Ruim</label><br>
      </div>
      <h3>Disponibilidade para exclarecer dúvidas:</h3>  
      <div class="form-check">
          <input class="form-check-input" type="radio"  value="radioMuito_10" id="radioMuito_10" disabled>
          <label class="form-check-label">Muito Bom</label><br>
          <input class="form-check-input" type="radio"  value="radiobom_10" id="radiobom_10" disabled>
          <label class="form-check-label">Bom</label><br>
          <input class="form-check-input" type="radio"  value="radioRegular_10" id="radioRegular_10" disabled>
          <label class="form-check-label">Regular</label><br>
          <input class="form-check-input" type="radio"  value="radioRuim_10" id="radioRuim_10" disabled>
          <label class="form-check-label">Ruim</label><br>
      </div>
      <h3>Sugestões:</h3>  
      <div class="form-check">
          <label class="form-check-label" id="sugestoes_11">Muito Bom</label><br>
      </div>
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
        "<td>"+a.descricao_profissional+"</td>"+
        "<td>"+imprimeCPF(a.cpf_profissional)+"</td>"+
        "<td>"+a.descricao_cidade +"/"+ a.descricao_uf +"</td>"+
        "<td>"+a.descricao_tipo_profissional+"</td>"+
      
        "<td>"+
          '<button class="btn btn-xs btn-primary botoes" onclick="exibir('+a.id+')">Resumo</button>'+
        "</td>"+
        "</tr>";

        return linha;
    }

/************************************EXIBIR AVALIAÇÃO************************************/

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
        
         if(data[0].descricao_profissional == 1){$("#nome_agente").attr('checked', true);}
         if(data[0].tipo_profissional == 1){$("#tipo_agente").attr('checked', true);}

         if(data[0].descricao != "")$('#sugestoes_11').text(data[0].descricao);

        $('#dlgAvaliacoes').modal('show');
        });
       }

        /***************TESTES******************/


      /************************************LISTAR************************************/
      
       function listarAvaliacoes (){

       $.getJSON('/api/avaliacoes', function(avaliacoes){
         for( i = 0; i < avaliacoes.length; i++){
           if(avaliacoes[i].cidade_id !== 1){
           linha = montarLinha(avaliacoes[i])
           $('#tabelaAvalicoes>tbody').append(linha);
      }}
      });
    }

    function listarCidades(){

    $.getJSON('/api/cidades' , function(data){
     
      for( i = 0; i < data.length; i++){
        if(data[i].id !== 1){
         opcao = '<option  select  value="'+ data[i].id +'">'+ data[i].descricao_cidade + data[i].descricao_uf + '</option>';
         $('#id_cidade').append(opcao);
        }
      }
      });
      }

function checkedFalse(){
          
          $("#radioSim_1").attr('checked', false);
          $("#radioNao_1").attr('checked', false);

          $("#radioMuito_2").attr('checked', false);
          $("#radiobom_2").attr('checked', false);
          $("#radioRegular_2").attr('checked', false);
          $("#radioRuim_2").attr('checked', false);
       
          $("#radioSeguro_3").attr('checked', false);
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
          $("#radiobom_7").attr('checked', false);
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
         
        }

 /************************************UTILS************************************/

   function imprimeCPF($CPF) {
        return($CPF.substring(0, 3) + "." + $CPF.substring(3, 6) + "." +
                $CPF.substring(6, 9) + "-" + $CPF.substring(9, 11));
    }

   /***********************************GERAR EXCEL************************************/

  function gerarExcelPostAvaliacoes() {

    a = {
        id_cidade: $("#id_cidade").val(),
        };
      $.ajax({
          type: "POST",
          url: "/excel/avaliacoes",
          data: a,
          context: this,
          xhrFields: {
            responseType: 'blob'
          },
          success: function (blob) {
            console.log(blob.size);
            var link=document.createElement('a');
            link.href=window.URL.createObjectURL(blob);
            link.download="Avaliacoes_" + new Date(); + ".xlsx";
            link.click();
          },
          error: function(error){
          console.log(error);
          }
        });
       
}
  
   $("#formAvaliacoes").submit(function (event) {
   event.preventDefault();

   gerarExcelPostAvaliacoes();
  
});

/*********AUTO LOAD**********/

    $(function () {
      listarCidades();
      listarAvaliacoes();
      })
    </script>
@endsection

