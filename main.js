$(document).ready(function(){
  cadUsuario = $("#cadUsuario").DataTable({
      "columnDefs":[{
      "targets": -1,
      "data":null,
      "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnExcluir'>Excluir</button></div></div>"          
      }],
      
      "language":{
        "lengthMenu":"Mostrar _MENU_ cadastros",
        "zeroRecords":"Não existem cadastros",
        "info":"Registros de _START_ até _END_ de _TOTAL_",
        "infoEmpty":"Não existem cadastros",
        "infoFiltered":"(Filtrando o total de _MAX_ cadastros)",
        "sSearch":"Buscar",
        "oPaginate":{
          "sFirst":"Primeiro",
          "sLast":"Ultimo",
          "sNext":"Proximo",
          "sPrevious":"Anterior"    
        }, 
        "sProcessing":"Processando...",  
     }
           
  });
    
  $("#btnNovo").click(function(){
    $("#formUsuarios").trigger("reset");  
    $(".modal-header").css("background-color","#28a745"); 
    $(".modal-header").css("color","white");   
    $(".modal-title").text("Novo cadastro de usuário");   
    $("#modalCRUD").modal("show");
    id=null; 
    opcao = 1;//novo
    
  }); 
    
  var fila; 
    //btn editar
 $(document).on("click",".btnEditar", function(){
      fila = $(this).closest("tr");
      id = parseInt(fila.find('td:eq(0)').text());
      nome = fila.find('td:eq(1)').text();
      email = fila.find('td:eq(2)').text();
      senha = parseInt(fila.find('td:eq(3)').text());
      
      $("#nome").val(nome);
      $("#email").val(email);
      $("#senha").val(senha);
      
      opcao = 2;//editar
      
      $(".modal-header").css("background-color","blue"); 
      $(".modal-header").css("color","white");   
      $(".modal-title").text("Editar cadastro de usuário");   
      $("#modalCRUD").modal("show");
     
     
    
      
  });  
    
    //btn Apagar
  $(document).on("click",".btnExcluir", function(){
      fila = $(this).closest("tr");
      id = parseInt(fila.find('td:eq(0)').text());
      opcao = 3;//apagar
      var resposta = confirm("Tem certeza que deseja apagar o cadastro:" +id+ "?");
      if(resposta){
          $.ajax({
            url:"bd/crud.php",
            type: "POST",
            dataType: "json",
            data:{opcao:opcao,id:id},
            success: function(){
                cadUsuario.row(fila.parents('tr')).remove().draw();
            }
          });
          location.reload();
          
      }
  });    
    
    
    
     
    
    $("#formUsuarios").submit(function(e){
        e.preventDefault();
       // id = $.trim($("#id").val());
        nome = $.trim($("#nome").val());
        email = $.trim($("#email").val());
        senha = $.trim($("#senha").val());
        $.ajax({
            url:"bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {id:id, nome:nome, email:email, senha:senha, opcao:opcao},
            success: function(data){
//                console.log(data);
                id = data[0].id;
                nome = data[0].nome;
                email = data[0].email;
                senha = data[0].senha;
                if(opcao == 1){cadUsuario.row.add([id,nome,email,senha]).draw();}
                else{cadUsuario.row(fila).data([id,nome,email,senha]).draw();}
                             
            }
//            location.reload();
            
        });
          $("#modalCRUD").modal("hide");
        
                              
    });
    
});


   