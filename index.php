<?php 
    include_once 'controller/stockController.php';
    $turma=new stockController();
    $disc=$turma->getStock();
    $cliente="Guest";
    session_start();
    
    if(isset($_SESSION['nome'])){
        $cliente=$_SESSION['nome'];
        
    }
    
    
?>

<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="estaleiro, construir, construcao, blocos, areia,cimento, pedra">
    <meta name="autor" content="Aurelio">
    <title>EstaleiroAPM</title>
    <link rel="stylesheet" href="style.css">
    <link href="estilo.css" rel="stylesheet" type="text/css"/>
    <link href="src/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="src/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="src/js/bootstrap.min.js" type="text/javascript"></script>
    
</head>

<body>
  <header class="barra">
    
    <div id="fot" class="logo ">
        <img src="./img/logoo.PNG">
    </div>
</header> <br><br>
    <div class="container" style="margin-top: 50px; width: 100%;">
        <nav class="navbar navbar-expand-lg bg-body-tertiary container" >
            <div class="container-fluid">
                <a class="navbar-brand" href="#">EstaleiroAM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse menuG" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="venda.php">Vendas</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link " href="carrinho.php"> Carrinho</a>
                        </li>

                       
                        <li class="nav-item">
                            <a class="nav-link " href="areaFun.php" >Area do Funcionario </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contacto.php"> Contacte-nos</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="<?= $nome?>" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <?php
                        if($cliente=="Guest"){?>
                           <a class="ml-2"> <?=$cliente?></a> <a href="login.php" class="ml-2">Entrar</a> 
                        <?php } else {?>
                               <a class="ml-2"><?=$cliente?></a> <a href="controller/logOut.php" class="ml-2">Sair</a>
                          <?php }?>
                           
                    
                </div>
            </div>
        </nav> <br>

        <div id="carouselExampleInterval" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-inner ">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="./img/ali.jpg" class="d-block img-fluid img-thumbnail rounded mx-auto d-block" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="./img/blo7.jpg" class="d-block  img-fluid img-thumbnail rounded mx-auto d-block " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/10.jpg" class="d-block  img-fluid img-thumbnail rounded mx-auto d-block" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="./img/aliPar.jpg" class="d-block  img-fluid img-thumbnail rounded mx-auto d-block" alt="...">
              </div>
              
              <div class="carousel-item">
                <img src="./img/Alipare.avif" class="d-block  img-fluid img-thumbnail rounded mx-auto d-block" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./img/blocos-de-concreto-de-cimento-em-paletas-de-madeira_100800-7783.avif" class="d-block  img-fluid img-thumbnail rounded mx-auto d-block" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./img/blocos-de-concreto-estao-no-chao-e-secos_661209-369.avif" class="d-block  img-fluid img-thumbnail rounded mx-auto d-block" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./img/fundo-de-parede-de-tijolo-cinza_1372-443.avif" class="d-block  img-fluid img-thumbnail rounded mx-auto d-block" alt="...">
      </div>
      
            
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
<br>

    <div class="row row-cols-1 row-cols-md-3 g-4 p-2" >
        <?php foreach ($disc as $item){ ?>
        
            <div class="col ">
          <div class="card h-100 col-12">
              <img src="./img/<?=$item['foto']?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $turma->getProdutoDescricao($item['id_produto'])?></h5>
              <p class="card-text">O melhor  que existe para sua obra a bom preco.</p>
              
              <a class="btn btn-sm btn-info text-light " data-toggle="modal" data-target="#update" data-whatever1="<?= $item['id']?>" 
                          data-whatever2="<?= $turma->getProdutoDescricao($item['id_produto'])?>" data-whatever3="<?= $item['preco']?>" data-whatever4="<?= $item['quantidade']?>">Comprar</a>
            </div>
          </div>
        </div>
        
       <?php } ?>
        
        
        
        
        
          
      </div>
      <footer style="background: rgb(170, 152, 152); text-align: center; text-decoration: none; margin-top: 2%;">
				Contacte-nos pelo whatsap: <a href="https://api.whatsapp.com/send?phone=258840350406&text=Encontrei%20seu%20contacto%20no%20Poertfolio">Contacto</a>
				<address>
				 <img class="imgs_peq" src="./img/mail.png" style="height: 50px; width: 50px;" alt="E-mail:"><a href="mailto:atendimento@EstaleiroAPM.com">atendimento@EstaleiroAPM.com</a>
				 <img class="imgs_peq" src="../img/wpp.png" style="height: 50px; width: 50px;" alt="Wpp:"><a href="https://api.whatsapp.com/send?phone=88996695833" target="_blank">(+258) 840350406</a>
				</address>
				<p>&copy; Todos os direitos reservados.</p>
		 </footer>



                 
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
                      <label>Stock id</label>
                      <input type="text" class="form-control form-control-sm" id="stockIdc">
                  </div>
                  <div class="form-group pl-1 col-6">
                      <label>Nome do cliente</label>
                      <input type="text" class="form-control form-control-sm" id="nomeClientec">
                  </div>
                  
              </div>
              <div class="row">
                  <div class="form-group pl-1 col-6">
                      <label>Preco</label>
                      <input type="text" class="form-control form-control-sm" id="precoc">
                  </div>
                  <div class="form-group pl-1 col-6">
                      <label>Quantidade</label>
                      <input type="text" class="form-control form-control-sm" id="quantidadec">
                  </div>
                  
              </div>
              <div class="row">
                  <div class="form-group pl-1 col-12">
                      <label>Preco total</label>
                      <input type="text" class="form-control form-control-sm" id="precoTotalc">
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
        <h5 class="modal-title text-light" id="exampleModalLabel">Adicionar ao carrinho</h5>
        
      </div>
        
        <!-- Modal para cadastrar turma!! -->
      <div class="modal-body">
          <form action="controller/carrinhoController.php" method="post">
              <div class="row">
                  <div class="form-group pl-1 col-5">
                      <label>Descricao</label>
                      <input type="text" class="form-control form-control-sm" id="stockId" disabled="">
                  </div>
                  <div class="form-group pl-1 col-4">
                      <label>Preco</label>
                      <input type="text" class="form-control form-control-sm" id="nomeCliente" disabled="">
                  </div>
                  <div class="form-group pl-1 col-3">
                      <label>Quantidade</label>
                      <input type="text" class="form-control form-control-sm" id="preco">
                  </div>
                  
              </div>
              
              
              <input type="hidden" id="id">
              <input type="hidden" id="acaou" value="addCarrinho">
              
              
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-success" data-dismiss="modal" id="but_actualizar">Actualizar</button>
        <button type="button" class="btn btn-primary btn-sm btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para cadastrar turma!! 
<div class="modal fade" id="apagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-light" id="exampleModalLabel">Exclusao de dados</h5>
        
      </div>
        
        
      <div class="modal-body">
          <form action="controller/vendaController.php" method="post">
              
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
</div> !-->


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
        var precoTotal = $('#precoTotalc').val();
        var acao = $('#acaoc').val();
        
       
        // Método post do Jquery
        $.post('controller/vendaController.php', {  
            stockId:stockId,
            nomeCliente:nomeCliente,
            preco:preco,
            quantidade:quantidade,
            precoTotal:precoTotal,
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
        var acao = $('#acaou').val();
        
       
        // Método post do Jquery
        $.post('controller/carrinhoController.php', {  
            id:id,
            stockId:stockId,
            nomeCliente:nomeCliente,
            preco:preco,
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
                
               
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                   
                modal.find('#id').val(recipient1);
                modal.find('#stockId').val(recipient2);
                modal.find('#nomeCliente').val(recipient3);
                modal.find('#preco').val(recipient4);
                
               
                
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
        $.post('controller/vendaController.php', {  
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

/*$(document).ready(function(){
    $('#apagar').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var recipient1 = button.data('whatever1'); // Extract info from data-* attributes

                var modal = $(this);
                   
                modal.find('#ida').val(recipient1);     
                
                });
});*/
  </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
