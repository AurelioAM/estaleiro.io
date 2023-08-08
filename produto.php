<?php 
    include_once 'controller/produtoController.php';
    $turma=new produtoController();
    $disc=$turma->getTurma();
    
    $cliente="Guest";
    session_start();
    
    if(isset($_SESSION['nome'])){
        $cliente=$_SESSION['nome'];
        
    }
    
?>



<html>
    <head>
        <title>Gestao do produto</title>
        <link href="src/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="src/js/jquery-3.4.1.min.js" type="text/javascript"></script> 
        <script src="src/js/bootstrap.min.js" type="text/javascript"></script>
        
        
        <style>
            table thead td{
                
            } 
            
        </style>
    </head>
    <body>
        <div class="">
                
           
            <nav class="navbar navbar-expand-lg bg-primary  navbar-light pb-0 pt-0 sticky-top" >
                <div class="container-fluid">
                <a class="navbar-brand h1 mb-0 text-light  " href="#"><h2>SGE</b></h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsite">
                  <span class="navbar-toggler-icon"></span>

                </button>

                 <div class="collapse navbar-collapse" id="navbarsite">
                  <ul class="navbar-nav mr-auto ml-5 ">
                    

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-light" href="#" data-toggle="dropdown" id="navDrop"><b>Loja</b></a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="carrinho.php">Carrinho</a>
                    <a class="dropdown-item" href="venda.php">Recibos</a>

                    </div>
                    </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle text-light" href="#" data-toggle="dropdown" id="navDrop"><b>Área restrita</b></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="stock.php">Stock</a>
                        <a class="dropdown-item" href="produto.php">Produto</a>
                     <a class="dropdown-item" href="funcionario.php">Funcionarios</a>
                     <a class="dropdown-item" href="cliente.php">Clientes</a>
                    </div>
                    </li>


                 </div>
                <div class="d-flex justify-content-end">
                  <?php
                        if($cliente=="Guest"){?>
                    <a class="ml-2 font-weight-bold text-light"> <?=$cliente?></a> <a href="login.php" class="ml-2 text-light"><u>Entrar</u></a> 
                        <?php } else {?>
                               <a class="ml-2"><?=$cliente?></a> <a href="controller/logOut.php" class="ml-2 text-light">Sair</a>
                          <?php }?>  
            </div>
                 </div>


                </nav>
         </div> 
        <div class=" container mt-5 d-flex justify-content-center">
            <div class=" col-9 ">
            <h2 class="text-secondary text-center">Gestao dos Produtos</h2>
                <a class="btn btn-sm btn-success mb-1 text-light" data-toggle="modal" data-target="#cadastro">adicionar</a>
             <table  class="table table-bordered table-sm">
            <thead>
                <tr>
                    <td class="">Id</td>
                    <td>Produto</td>
                    <td>Descricao</td>
                    <td>Opcoes</td>
                </tr>
            </thead>
            <tbody id="recebe">
                <?php
                foreach ($disc as $d){?>
                   <tr>
                   <td class="text-center" style=" font-weight:bold"> <?= $d['id']?></td>
                   <td> <?= $d['nome']?></td> 
                   <td> <?= $d['descricao']?></td> 
                   <td class="text-center">
                       <a class="btn btn-sm btn-primary text-light " data-target="#update" data-toggle="modal" data-whatever1="<?= $d['id']?>" data-whatever2="<?= $d['nome']?>" data-whatever3="<?= $d['descricao']?>">Update</a>
                       <a class="btn btn-sm btn-danger text-light" data-target="#apagar" data-toggle="modal" data-whatever10="<?= $d['id']?>" >Delete</a>
                   </td>
                </tr>
               <?php }?>
                
                
            </tbody>
        </table>
            
        </div>
        </div>
<!-- Modal para cadastrar produto!! -->
<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-light" id="exampleModalLabel">Cadastro do Produto</h5>
        
      </div>
        
        
        
        <!-- Modal para cadastrar produto!! -->
      <div class="modal-body">
          <form action="controller/produtoController.php" method="post" enctype="multipart/form-data">
              <div class="row">
                  <div class="form-group pl-1 col-6">
                      <label>Nome</label>
                      <input type="text" id="nome" class="form-control form-control-sm">
                  </div>
                  <div class="form-group pl-1 col-6">
                      <label>Descricao</label>
                      <input type="text" id="descricao" class="form-control form-control-sm">
                  </div>
                  
              </div>
              <input type="file" id="foto" class="form-control form-control-sm p-2">
              <input type="hidden" id="acao" value="cadastrar">
            
              
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-success" id="but_salvar" data-dismiss="modal">cadastrar</button>
        <button type="button" class="btn btn-primary btn-sm btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
        
<!-- Modal para actualizar produto!! -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-light" id="exampleModalLabel">Actualizacao do produto</h5>
        
      </div>
        
        
      <div class="modal-body">
          <form action="controller/produtoController.php" method="post">
              <div class="row">
                  <div class="form-group pl-1 col-6">
                      <label>Nome</label>
                      <input type="text" id="nomeup" class="form-control form-control-sm">
                  </div>
                  <div class="form-group pl-1 col-6">
                      <label>Descricao</label>
                      <input type="text" id="descricaoup" class="form-control form-control-sm">
                      <input type="hidden" id="idup" class="form-control form-control-sm">
                      
                  </div>
                  
              </div>
              
              <input type="hidden" id="acaou" value="update">
            
              
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-success" id="but_actualizar" data-dismiss="modal">Actualizar</button>
        <button type="button" class="btn btn-primary btn-sm btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal eliminar!! -->
<div class="modal fade" id="apagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-light" id="exampleModalLabel">Exclusao do produto!</h5>
        
      </div>
        
        <!-- Modal para apagar produto!! -->
      <div class="modal-body">
          <form action="controller/produtoController.php" method="post">
             <h6 class="text-info">Realmente deseja eliminar esta linha?</h6>
              <input type="hidden" id="idApagar" >
              <input type="hidden" id="acaoa" value="apagar">
              
              
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm btn-success" data-dismiss="modal" id="bt_delete">Sim</button>
        <button type="button" class="btn btn-primary btn-sm btn-danger" data-dismiss="modal">Nao</button>
      </div>
    </div>
  </div>
</div>
        
        

<!-- jquery para cadastrar -->
<script type="text/javascript">
    $(function(){
    // Executa assim que o botão de salvar for clicado
    $('#but_salvar').click(function(e){
        
        
        // Pega os valores dos inputs e coloca nas variáveis
        var nome = $('#nome').val();
        var descricao = $('#descricao').val();
        var foto = $('#foto').val();
        var acao = $('#acao').val();
        
       
        // Método post do Jquery
        $.post('controller/produtoController.php', {          
            nome:nome,
            foto:foto,
            descricao:descricao,
            acao: acao
            
        },function(resposta){
            
            // Valida a resposta
            if(resposta === 1){
                // Limpa os inputs
                
            }else {
                     $('#cod_turma').val("");
                $('#nome_turma').val("");
                $('#nome_estudante').val("");
                // $("#exampleModal").modal('hide');
                $('#recebe').html(resposta);
                
            }
        });
        
        
    });
});

$(document).ready(function(){
    
});
  </script>


<script type="text/javascript">
            $(document).ready(function (){
               $('#update').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient1 = button.data('whatever1'); // Extract info from data-* attributes
                var recipient2 = button.data('whatever2'); // Extract info from data-* attributes
                var recipient3 = button.data('whatever3'); // Extract info from data-* attributes
               
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                   
                modal.find('#idup').val(recipient1);
                modal.find('#nomeup').val(recipient2);
                modal.find('#descricaoup').val(recipient3);
               
                
                });
              
              

            });
            
            $(document).ready(function (){
               $('#apagar').on('show.bs.modal', function(event) {
                  var botton = $(event.relatedTarget);
                  var referencia = botton.data('whatever10');
                  
                  var modal=$(this);
                  modal.find('#idApagar').val(referencia);
                 
              }); 
              
            });
            
            $(document).ready(function (){
               $('#bt_delete').click(function(e){
        
        // Pega os valores dos inputs e coloca nas variÃ¡veis
        var acao = $('#acaoa').val();
        var id = $('#idApagar').val();
        
       
        // MÃ©todo post do Jquery
        $.post('controller/produtoController.php', {
            id:id,
            acao:acao
            
            
        },function(resposta){
            
            // Valida a resposta
            if(resposta === 1){
                // Limpa os inputs
               
               
                
            }else {
                 $("#modalApagar").modal('hide');
                    
                  $('#recebe').html(resposta);
                 
                                
            }
        });   
        }); 
      });
              
                        
          
          </script>
        
        
        
        
        
        <!-- jquery para actualizar -->
<script type="text/javascript">
    $(function(){
    // Executa assim que o botão de actualizar for clicado
    $('#but_actualizar').click(function(e){
        
        // Pega os valores dos inputs e coloca nas variáveis
        var id=$('#idup').val();
        var nome = $('#nomeup').val();
        var descricao = $('#descricaoup').val();
        var acao = $('#acaou').val();
        
       
        // Método post do Jquery
        $.post('controller/produtoController.php', {  
            id:id,
            nome:nome,
            descricao:descricao,
            acao: acao
            
        },function(resposta){
            
            // Valida a resposta
            if(resposta == 1){
                // Limpa os inputs
               
                
            }else {
             /*        $('#cod_turma').val("");
                $('#nome_turma').val("");
                $('#nome_estudante').val("");
                // $("#exampleModal").modal('hide');
                $('#recebe').html(resposta);*/
                 $('#recebe').html(resposta);
                
            }
        });
        
        
    });
});

$(document).ready(function(){
    
});
  </script>
      
    </body>
</html>

