<?php
include_once'/bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta= "SELECT id,nome,email,senha FROM usuarios";
$resultado= $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#">
    <title> CRUD Tradenergy</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
      
    <link rel="stylesheet"  type="text/css" href="datatables/datatables.min.css">
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css">               
  </head>
    
  <body>
    <header>
        <img src="images/tradenergycrud.png" class="rounded mx-auto d-block" alt="...">
        <h4 class="text-center ">Gerenciamento de Usuários</h4>  
    </header>
      
    <div class="container">
        <div class="row">
            <div class="col-lg-14">
                <button id="btnNovo" type="button" class="btn btn-success" color="#009999">Novo</button>
            </div>     
        </div>    
    </div>  
      
      
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="cadUsuario" class="table table-striped table-bordered table-condensed" style="width: 100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Senha</th>
                                <th>Ações</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($data as $dat){
                            ?>
                            <tr>
                                <td><?php echo $dat['id']?></td>
                                <td><?php echo $dat['nome']?></td>
                                <td><?php echo $dat['email']?></td>
                                <td><?php echo $dat['senha']?></td>
                                <td></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>     
        </div>    
    </div>    
      
      <!--Formulario para cadastro e alteração de usuários--->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-disniss="modal" aria-label="Close"><span aria-hidden="true">&times;
                </span>
                </button>
            </div>
            <form id="formUsuarios">
                <div class="modal-body">
                    <div class="form-group">
                    <label for="Nome" class="col-form-label">Nome</label> 
                    <input type="text" class="form-control" id="nome">    
                    </div>
                    <div class="form-group">
                    <label for="E-mail" class="col-form-label">E-mail</label> 
                    <input type="text" class="form-control" id="email">    
                    </div>
                    <div class="form-group">
                    <label for="Senha" class="col-form-label">Senha</label> 
                    <input type="number" class="form-control" id="senha">    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGravar" class="btn btn-dark">Gravar</button>
                </div>     
            </form>
        </div>
    </div>
</div>   
      
      <script src="jquery/jquery-3.5.1.min.js"></script>
      <script src="popper/popper.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
       
      
     <script type="text/javascript" src="datatables/datatables.min.js"></script>
      <script type="text/javascript" src="main.js"></script>
      
  </body> 

<footer class="page-footer">
  <div class="footer-copyright text-center py-3">Feito com carinho por Janaine Rodrigues
      <a href="https://github.com/janadro">
          <img src="images/github.png" class="rounded mx-left" alt="img-github">
      </a> 
       <a href="https://www.linkedin.com/in/janaine-rodrigues-96a221117/">
          <img src="images/linkedin.png" class="rounded mx-left" alt="img-Linkedin">
      </a>         
  </div>

</footer>

    
</html>