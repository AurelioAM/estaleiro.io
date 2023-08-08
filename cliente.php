<?php 
    include_once 'controller/clienteController.php';
    $turma=new clienteController();
    $disc=$turma->getCliente();
    
    $cliente="Guest";
    session_start();
    
    if(isset($_SESSION['nome'])){
        $cliente=$_SESSION['nome'];
        
    }
    
?>



<html>
    <head>
        <title>Gestao de cliente</title>
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
        <div class=" container mt-5">
            <h2 class="text-secondary text-center">Gestao dos clientes</h2>
                <a class="btn btn-sm btn-success mb-1 text-light" data-toggle="modal" data-target="#cadastro">adicionar</a>
             <table  class="table table-bordered table-sm">
            <thead>
                <tr>
                    <td class="">Id</td>
                    <td>Nome</td>
                    <td>Endereco</td>
                    <td>E-mail</td>
                    <td>Telefone</td>
                     
                    <td>Opcoes</td>
                </tr>
            </thead>
            <tbody id="recebe">
                <?php
                foreach ($disc as $d){?>
                   <tr>
                   <td class="text-center" style=" font-weight:bold"> <?= $d['id']?></td>
                   <td> <?= $d['nome']?></td> 
                   <td> <?= $d['endereco']?></td> 
                       <td> <?= $d['email']?></td> 
                       <td> <?= $d['telefone']?></td> 
                       
                   <td>
                       <a class="btn btn-sm btn-primary text-light" data-toggle="modal" data-target="#update" data-whatever1="<?= $d['id']?>" 
                          data-whatever2="<?= $d['nome']?>" data-whatever3="<?= $d['endereco']?>" data-whatever4="<?= $d['email']?>"  data-whatever5="<?= $d['telefone']?>" data-whatever6="<?= $d['cod_cliente']?>"  >Update</a>
                       <a class="btn btn-sm btn-danger text-light" data-toggle="modal" data-target="#apagar" data-whatever1="<?= $d['id']?>" >Delete</a>
                   </td>
                </tr>
               <?php }?>
                
                
            </tbody>
        </table>
            
        </div>

<!-- Modal para cadastrar turma!! -->
<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-light" id="exampleModalLabel">Formulario de venda</h5>
        
      </div>
        
        <!-- Modal para cadastrar venda!! -->
      <div class="modal-body">
          <form action="controller/vendaController.php" method="post" class="p-2">
              <div class="row">
                  <div class="form-group pl-1 col-6">
                      <label>Nome do cliente</label>
                      <input type="text" class="form-control form-control-sm" id="stockIdc">
                  </div>
                  <div class="form-group pl-1 col-6">
                      <label>Endereco</label>
                      <input type="text" class="form-control form-control-sm" id="nomeClientec">
                  </div>
                  
              </div>
              <div class="row">
                  <div class="form-group pl-1 col-6">
                      <label>E-mail</label>
                      <input type="email" class="form-control form-control-sm" id="precoc">
                  </div>
                  <div class="form-group pl-1 col-6">
                      <label>Telefone</label>
                      <input type="text" class="form-control form-control-sm" id="quantidadec">
                  </div>
                  
              </div>
              
              <input type="hidden" id="acaoc" value="cadastrar">
              
              
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-success" id="but_salvar" data-dismiss="modal">cadastrar</button>
        <button type="button" class="btn btn-primary btn-sm btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Update Venda!! -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-light" id="exampleModalLabel">Acualização dos dados do cliente</h5>
        
      </div>
        
        <!-- Modal para cadastrar turma!! -->
      <div class="modal-body">
          <form action="controller/clienteController.php" method="post">
              <div class="row">
                  <div class="form-group pl-1 col-6">
                      <label>Nome do Cliente</label>
                      <input type="text" class="form-control form-control-sm" id="stockId">
                  </div>
                  <div class="form-group pl-1 col-6">
                      <label>Endereco</label>
                      <input type="text" class="form-control form-control-sm" id="nomeCliente">
                  </div>
                  
              </div>
              <div class="row">
                  <div class="form-group pl-1 col-6">
                      <label>E-mail</label>
                      <input type="text" class="form-control form-control-sm" id="preco">
                  </div>
                  <div class="form-group pl-1 col-6">
                      <label>Telefone</label>
                      <input type="text" class="form-control form-control-sm" id="quantidade">
                  </div>
                  
              </div>
              
              <input type="text" id="id">
              <input type="text" id="cod">
              
              <input type="hidden" id="acaou" value="update">
              
              
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-success" data-dismiss="modal" id="but_actualizar">Actualizar</button>
        <button type="button" class="btn btn-primary btn-sm btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para cadastrar turma!! -->
<div class="modal fade" id="apagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-light" id="exampleModalLabel">Exclusao de dados</h5>
        
      </div>
        
        <!-- Modal para apagar turma!! -->
      <div class="modal-body">
          <form action="controller/clienteController.php" method="post">
              
              <input type="hidden" id="acaoa" value="apagar">
              <input type="hidden" id="ida">
              
          </form>
          <h6 class="text-info">Realmente deseja excluir esses dados?</h6>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn  btn-sm btn-success" data-dismiss="modal" id="but_apagar">Excluir</button>
        <button type="button" class="btn btn-primary btn-sm btn-danger" data-dismiss="modal">Cancel</button>
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
        var stockId = $('#stockIdc').val();
        var nomeCliente = $('#nomeClientec').val();
        var preco = $('#precoc').val();
        var quantidade = $('#quantidadec').val();
        var acao = $('#acaoc').val();
        
       
        // Método post do Jquery
        $.post('controller/clienteController.php', {  
            stockId:stockId,
            nomeCliente:nomeCliente,
            preco:preco,
            quantidade:quantidade,
            acao: acao
            
        },function(resposta){
            
            // Valida a resposta
            if(resposta == 1){
                // Limpa os inputs
               
                
            }else {
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
        var id=$('#id').val();
        var stockId = $('#stockId').val();
        var nomeCliente = $('#nomeCliente').val();
        var preco = $('#preco').val();
        var quantidade = $('#quantidade').val();
        var cod = $('#cod').val();
        var acao = $('#acaou').val();
        
       
        // Método post do Jquery
        $.post('controller/clienteController.php', {  
            id:id,
            stockId:stockId,
            nomeCliente:nomeCliente,
            preco:preco,
            quantidade:quantidade,
            cod:cod,
            acao: acao
            
        },function(resposta){
            
            // Valida a resposta
            if(resposta == 1){
                // Limpa os inputs
               
                
            }else {
                 $('#recebe').html(resposta);
                 
                
            }
        });
        
        
    });
});

$(document).ready(function(){
    $('#update').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient1 = button.data('whatever1'); // Extract info from data-* attributes
                var recipient2 = button.data('whatever2'); // Extract info from data-* attributes
                var recipient3 = button.data('whatever3'); // Extract info from data-* attributes
                var recipient4 = button.data('whatever4'); // Extract info from data-* attributes
                var recipient5 = button.data('whatever5'); // Extract info from data-* attributes
                var recipient6 = button.data('whatever6'); // Extract info from data-* attributes
               
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                   
                modal.find('#id').val(recipient1);
                modal.find('#stockId').val(recipient2);
                modal.find('#nomeCliente').val(recipient3);
                modal.find('#preco').val(recipient4);
                modal.find('#quantidade').val(recipient5);
                modal.find('#cod').val(recipient6);
                
               
                
                });
});
  </script>
   
  <!-- jquery para apagar -->
<script type="text/javascript">
    $(function(){
    // Executa assim que o botão de actualizar for clicado
    $('#but_apagar').click(function(e){
        
        // Pega os valores dos inputs e coloca nas variáveis
        var id=$('#ida').val();
        var acao = $('#acaoa').val();
        
       
        // Método post do Jquery
        $.post('controller/clienteController.php', {  
            id:id,
            acao: acao
            
        },function(resposta){
            
            // Valida a resposta
            if(resposta == 1){
                // Limpa os inputs
               
                
            }else {
                 $('#recebe').html(resposta);
                 
                
            }
        });
        
        
    });
});

$(document).ready(function(){
    $('#apagar').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient1 = button.data('whatever1'); // Extract info from data-* attributes

                var modal = $(this);
                   
                modal.find('#ida').val(recipient1);     
                
                });
});
  </script>
    </body>
</html>

