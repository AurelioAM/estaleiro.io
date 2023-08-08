<?php
//include_once 'conexao.php';
include_once 'usuarioController.php';

class funcionarioController {
    public function numLinhas(){
        $bd= conexao();
        $sql=$bd->query("SELECT * FROM funcionario");
        $cont= mysqli_num_rows($sql);
        return $cont;
    }
    public  function geraCodigo(){
        
            $a= $this->numLinhas();
            $a+=1;
            $gera=rand(1,100);
            $acv="fun_01";
            $z=$acv.$a.$gera;
            return $z;
    }
    
     public function cadastro($a,$b,$c,$d,$e){
         $u=new usuarioController();
         $cod= $this->geraCodigo();
        $bd= conexao();
        $stmt=$bd->prepare("INSERT INTO `funcionario`(`nome`, `user`, `senha`, `tipo`, `status`,`cod_funcionario`)  VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $a,$b,$c,$d,$e,$cod);
        $stmt->execute(); 
        $u->cadastro($cod, $a, $b, $c);
       $this->lista();
       
       
    }
    
    public function getFuncionario(){
        $bd=Conexao();
           $sql="SELECT * FROM `funcionario`";
           $resultado=$bd->query($sql);
           $grupo = array();
           while ($row=mysqli_fetch_array($resultado)) {
               $grupo[]=$row;
               # code...
           }
           return $grupo;

}

public function lista(){
     $lista= $this->getFuncionario();
        foreach ($lista as $list){
            echo ' <tr>
                            <td class="text-center"><b> '.$list['id'].'</b></td>
                            <td> '.$list['nome'].'</td>
                                <td> '.$list['user'].'</td>
                                    <td> '.$list['senha'].'</td>
                                        <td> '.$list['tipo'].'</td>
                            <td>'.$list['status'].'</td>
                            
                            <td class="text-center">
                            
                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#apagar"  data-whatever1="'. $list['id'].'">Delete</a>
                            </td>
                        </tr>';
        }
}

public function apagarFuncionario($a){
        
        $bd= conexao();
        $stmt=$bd->prepare("DELETE FROM `funcionario` WHERE `id`=?");
        $stmt->bind_param("s", $a);
        $stmt->execute();   
        $this->lista();
    }
    
    public function updateFuncionario($a,$b,$c,$d,$e,$f){
        $u=new usuarioController();
        
        $bd= conexao();
        $stmt=$bd->prepare("UPDATE `funcionario` SET `nome`=?,`user`=?,`senha`=?,`tipo`=?,`status`=? WHERE `cod_funcionario`=?");
        $stmt->bind_param("ssssss", $a,$b,$c,$d,$e,$f);
        $stmt->execute();
        $u->updateUsuario($a, $b, $c, $f);
        //$this->lista();
       
        
      
       
    }
}


if(isset($_POST['acao'])){
    if($_POST['acao']==='apagar'){
        
        $obj=new funcionarioController();
        $a=$_POST['id'];
         $obj->apagarFuncionario($a);
        
    }elseif ($_POST['acao']==='cadastrar') {
        $obj=new funcionarioController();
        $b=$_POST['stockId'];
        $c=$_POST['nomeCliente'];
        $d=$_POST['preco'];
        $e=$_POST['quantidade'];
        $f=$_POST['precoTotal'];
        
        $obj->cadastro($b,$c,$d,$e,$f);
        
        
    }elseif ($_POST['acao']==='update') {
        $obj=new funcionarioController();
        
        $a=$_POST['id'];
        $b=$_POST['stockId'];
        $c=$_POST['nomeCliente'];
        $d=$_POST['preco'];
        $e=$_POST['quantidade'];
        $f=$_POST['precoTotal'];
        $g=$_POST['codigo'];
        $obj->updateFuncionario($b,$c,$d,$e,$f,$a,$g);
       
        
    }
    
}