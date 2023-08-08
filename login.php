<?php 
    
    
    
?>



<html>
    <head>
        <title>Login</title>
        <link href="src/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="src/js/jquery-3.4.1.min.js" type="text/javascript"></script> 
        <script src="src/js/bootstrap.min.js" type="text/javascript"></script>
        
        
        <style>
       
        </style>
    </head>
    <body class="p-5">
        <div class="d-flex justify-content-center mt-5">
             <form action="controller/usuarioController.php" method="post" class="p-2 col-3" >
                
        <div class="border p-4 rounded shadow">
             <h1 class="h1 text-center text-info" style="font-weight:bold;font-family: serif"> Login</h1>
             <hr>
            <div class="form-group p-1">
                <label class="text-info" style="font-weight:bold;font-family: serif">Usuário</label>
                <input type="text" class="form-control form-control-sm" name="user" required=""> 
        </div>
        <div class="form-group">
            <label class="text-info" style="font-weight:bold;font-family: serif">Senha</label>
            <input type="password" class="form-control form-control-sm" name="senha" required="" >
        </div>
             <input type="submit" class=" btn btn-sm btn-primary col-12" value="Entrar">
        </div>
        
        
        
        
      </form>   

            
        </div>
    
    </body>
</html>



