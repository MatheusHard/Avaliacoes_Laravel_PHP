@extends('layout.app',["current"=>"cidades"])


@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Cidades</h5>
       
        <table class="table table-ordered table-hover" id="tabelaCidades">
                
            <thead>
              <tr>
                <th>Código</th>
                <th>Cidade/UF</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            
             </tbody>
          </table>
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" role="button" onclick="novaCidade()">Nova Cidade</button>

<!--*************NOVO EXCEL*************---->

<div class="card-footer">
<div class="float-left">

<form class="form-horizontal" id="formCidadesExcel">
  <div class="modal-body">
    <div class="form-group">
      <label for="estados" class="control-label">UFS</label>
        <div class="input-group">
           <select class="form-control" id="uf_id_excel">
      
            </select>
          </div>
      </div>
     <div class="modal-footer">
       
        <nav id="paginator">
         <ul class="pagination">
       <!-- <li class="page-item">
        <a class="page-link" href="#">S</a></li>-->
         </ul>
        </nav>
     
      <button type="submit" class="btn btn-success">Excel</button>
    </div>
</div>
</form>
</div>
</div>

<!--***************-->

      <!--  <a href="{{asset('/excel/cidades')}}" class="btn btn-sm btn-success" role="button">Gerar Excel</a>-->
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
            <input type="text" class="form-control" id="descricao_cidade" placeholder="Nome da Cidade" 
             onkeyup="this.value = this.value.toUpperCase();">
        </div>
    </div>
  
    
    <div class="form-group">
      <label for="estados" class="control-label">Estados</label>
        <div class="input-group">
           <select class="form-control" id="uf_id">
       
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
   
$.ajaxSetup({
  headers:{
  'X-CSRF-TOKEN':"{{csrf_token()}}"
  }
});

   function novaCidade(){
      $('#id').val('');
      $('#descricaoCidade').val('');
      $('#uf_id').val('');
      $('#dlgCidades').modal('show');
    }



    function montarLinha(c) {

      return '<tr>' +
            '  <th scope="row">' + c.id + '</th>' +
            '  <td>' + c.descricao_cidade + "/" + c.descricao_uf + '</td>' +
            '  <td>' +
                '<button class="btn btn-xs btn-primary botoes" onclick="editar('+c.id+')">Editar</button>'+
                '<button class="btn btn-xs btn-danger botoes" onclick="remover('+c.id+')">Apagar</button>'+
            '  </td>'+
              '</tr>';        
        
    }
      
      /**********EDITAR CIDADE*********/
     
       function editar(id){
        
        $.getJSON('/api/cidades/show/'+id , function(data){
          console.log(data);

          $('#id').val(data.id);
          $('#descricao_cidade').val(data.descricao_cidade);
          $('#uf_id').val(data.uf_id);
          $('#dlgCidades').modal('show');
        });
       }

       /*******REMOVER CIDADE*******/

       function remover(id){
        $.ajax({
          type: "DELETE",
          url: "/api/cidades/"+id,
          context: this,
          success: function(){

          console.log("Cidade Deletada")
          linhas =  $("#tabelaCidades>tbody>tr");
          c = linhas.filter( function(i, elemento){
                         return elemento.cells[0].textContent == id;
                         });
          if(c){ c.remove();}
          },
          error: function(error){
          
          console.log(error)
          }
        });

       }
      /******LISTAR CIDADES*********/
      
      /* function listarCidades(){

      $.getJSON('/api/cidades' , function(cidades){

        for( i = 0; i < cidades.length; i++){
          if(cidades[i].id !== 1){
            console.log(cidades[i].id);
            linha = montarLinha(cidades[i])
            $('#tabelaCidades>tbody').append(linha);
      }}
      });
    }*/

function listarUfs(){

$.getJSON('/api/ufs' , function(data){
     opcao = '<option select value="'+ 0 +'">'+ "escolha UF" + '</option>';
     $('#uf_id').append(opcao);
    for( i = 0; i < data.length; i++){
    if(data[i].id !== 1){
     opcao = '<option select value="'+ data[i].id +'">'+data[i].descricao_uf + '</option>';
     $('#uf_id').append(opcao);
     }  
   }
  });
}

function listarUfsExcel(){

$.getJSON('/api/ufs' , function(data){
     opcao = '<option select value="'+ 0 +'">'+"TOTAL"+'</option>';
     $('#uf_id_excel').append(opcao);
  for( i = 0; i < data.length; i++){
    if(data[i].id !== 1){
     opcao = '<option select value="'+ data[i].id +'">'+data[i].descricao_uf+'</option>';
     $('#uf_id_excel').append(opcao);
}}
});
}
/*******************TESTES PAG******************/

function getItem(data, i){
    if (i == data.current_page)
        s = '<li class="page-item active">';
    else
        s = '<li class="page-item">';
    s += ' <a class="page-link" href="#">' + i + '</a></li>';
    return s;
}


function montarPaginator(data){
  console.log("DAta: "+ data);

  for(i = 1; data.total; i++){
    s = getItem(data, i);
    console.log(s);

    $("#paginator>ul").append(s);
    }
}


function montarTabela(data){

  $("#tabelaCidades>tbody>tr").remove();
  for(i = 0; i < data.data.length; i++){
    if(data.data[i].id !== 1){
    s =  montarLinha(data.data[i]);
    $("#tabelaCidades>tbody").append(s);
    }
  }
}

function carregarCidades(pagina){

  $.get('/api/cidades/index_pagination', {page: pagina}, function(resp){

  montarTabela(resp);
  //montarPaginator(resp);
  console.log("Dados:" + resp.data);

});

}


/**********CADASTRAR CIDADE**********/

function cadastrarCidade(){
c = {
  descricao_cidade: $("#descricao_cidade").val(),
  uf_id: $("#uf_id").val()

};
$.post('/api/cidades/store_api' , c, function(data){
  
  console.log(data);
  city = JSON.parse(data);
  console.log(city);
  linha = montarLinha(city);
  $('#tabelaCidades>tbody').append(linha);
});

$("#dlgCidades").modal('hide');
}

/**********SALVAR CIDADE EDITADA**********/

function salvarCidade() {
  c = {
    id: $("#id").val(),
    descricao_cidade: $("#descricao_cidade").val(),
    uf_id: $("#uf_id").val()
};
$.ajax({
          type: "POST",
          url: "/api/cidades/update/"+ c.id,
          data: c,
          context: this,

          success: function(data){
            c = JSON.parse(data);
            linhas = $('#tabelaCidades>tbody>tr');
            e = linhas.filter(function(i, e){
              return (e.cells[0].textContent == c.id);
            });   
            if(e){
              e[0].cells[0].textContent = c.id;
              e[0].cells[1].textContent = c.descricao_cidade +"/"+ c.descricao_uf;
              }
            alert('Cidade', {
            type:'sucess'
           });  
          },
          error: function(error){
          console.log(error);
    }
  });
}

/************GERAR EXCEL************/

function gerarExcelPostCidades() {
  c = {
    uf_id: $("#uf_id_excel").val()
    };
   $.ajax({
      type: "POST",
      url: "/excel/cidades",
      data: c,
      context: this,
      xhrFields: {
        responseType: 'blob'
      },
 
      success: function (blob) {
        
            console.log(blob.size);
            var link=document.createElement('a');
            link.href=window.URL.createObjectURL(blob);
            link.download="Cidades_" + dataHora() + ".xlsx";
            link.click();
          },
      error: function(error){
      console.log(error);
      }
    });
  }

$("#formCidades").submit(function (event) {
  event.preventDefault();
 
  if($("#id").val() != ''){
    salvarCidade();
  }else{
    cadastrarCidade();
  }
  
  $("#dlgCidades").modal('hide');
});

$("#formCidadesExcel").submit(function (event) {
   event.preventDefault();
   gerarExcelPostCidades();
 
});

/*********UTILS**********/

function dataHora(){
        
        var d = new Date();
        var datestring = d.getDate()  + "/" + (d.getMonth()+1) + "/" + d.getFullYear() + " " +
        d.getHours() + ":" + d.getMinutes();
        return datestring;
        }

/*******AUTO LOAD*******/
    
    $(function () {
      listarUfs();
      listarUfsExcel();
      //listarCidades();
      carregarCidades(1);
      })
    </script>
@endsection

