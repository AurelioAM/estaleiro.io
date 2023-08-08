<?php
include 'conexao.php';



/**
 * Description of usuarioController
 *
 * @author Donaldo
 */
class usuarioController {
    
     public function cadastro($a,$b,$c,$d){
        $bd= conexao();
        $stmt=$bd->prepare("INSERT INTO `login`(`codigo`, `nome`, `user`, `senha`)  VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $a,$b,$c,$d);
        $stmt->execute(); 

       
    }
    public function getConexao(){
        $bd= conexao();
        return $bd;
    }


    public function getLogin(){
        $bd=Conexao();
   $sql="SELECT * FROM `login`";
   $resultado=$bd->query($sql);
   $grupo = array();
   while ($row=mysqli_fetch_array($resultado)) {
       $grupo[]=$row;
       # code...
   }
   return $grupo;

}
public function  login($a,$b){
    $bd= conexao();

   $sql = "SELECT * FROM `login` WHERE `user`='$a' && `senha`='$b'";
    $resultado = $bd->query($sql);

if ($resultado->num_rows > 0) {
    // O ID foi encontrado, você pode exibir os resultados
    while ($row = $resultado->fetch_assoc()) {
        $nome=$row["nome"];
        // Adicione mais campos conforme necessário
    }
} else {
    echo "Nenhum resultado encontrado para o ID fornecido. ";
}
if($nome){
    session_start();
    $_SESSION['nome']=$nome;
    header("location: ../index.php");
} else {
    
    
    header("location: ../login.php");
}


    
    
}

public function updateUsuario($a,$b,$c,$d){
        $bd= conexao();
        $stmt=$bd->prepare("UPDATE `login` SET `nome`=?,`user`=?,`senha`=? WHERE `codigo`=?");
        $stmt->bind_param("ssss", $a,$b,$c,$d);
        $stmt->execute();   
        
    }
    
    
}
if (isset($_POST['user'])){
    $ojg=new usuarioController();
    $ojg->login($_POST['user'], $_POST['senha']);
}
