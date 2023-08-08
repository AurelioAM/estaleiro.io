<?php
include_once 'usuarioController.php';

class clienteController {
    public function numLinhas(){
        $bd= conexao();
        $sql=$bd->query("SELECT * FROM cliente");
        $cont= mysqli_num_rows($sql);
        return $cont;
    }
    public  function geraCodigo(){
        
            $a= $this->numLinhas();
            $a+=1;
            $gera=rand(1,100);
            $acv="cli_01";
            $z=$acv.$a.$gera;
            return $z;
    }
    
     public function cadastro($a,$b,$c,$d){
         $u=new usuarioController();
         $cod= $this->geraCodigo();
         
        $bd= conexao();
        $stmt=$bd->prepare("INSERT INTO `cliente` (`nome`, `endereco`, `email`, `telefone`,`cod_cliente`)  VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss", $a,$b,$c,$d,$cod);
        $stmt->execute(); 
        $u->cadastro($cod, $a, $c, $d);
        $this->lista();
       
    }
    
    public function getCliente(){
        $bd=Conexao();
   $sql="SELECT * FROM `cliente`";
   $grupo = array();
   $resultado=$bd->query($sql);
   while ($row=mysqli_fetch_array($resultado)) {
       $grupo[]=$row;
       # code...
   }
   return $grupo;

}
public function lista(){
     $lista= $this->getCliente();
        foreach ($lista as $list){
            echo ' <tr>
                            <td class="text-center"><b> '.$list['id'].'</b></td>
                            <td> '.$list['nome'].'</td>
                                <td> '.$list['endereco'].'</td>
                                    <td> '.$list['email'].'</td>
                                        <td> '.$list['telefone'].'</td>
                            
                            
                            <td class="text-center">
                            <a href="" class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target="#update" data-whatever1="'.$list['id'].'" data-whatever2="'.$list['nome'].'" data-whatever3="'.$list['endereco'].'"  data-whatever4="'. $list['email'].'" data-whatever5="'. $list['telefone'].'" >Update</a>
                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#apagar"  data-whatever1="'.$list['id'].'">Delete</a>
                            </td>
                        </tr>';
        }
}


    public function updateCliente($a,$b,$c,$d,$f){
        $u=new usuarioController();
        $bd= conexao();
        $stmt=$bd->prepare("UPDATE `cliente` SET `nome`=?,`endereco`=?,`email`=?,`telefone`=? WHERE `cod_cliente`=?");
        $stmt->bind_param("sssss", $a,$b,$c,$d,$f);
        $stmt->execute();  
        $u->updateUsuario($a, $c, $d, $f);
        $this->lista();
    }
    public function apagarCliente($a){
        $bd= conexao();
        $stmt=$bd->prepare("DELETE FROM `cliente` WHERE `id`=?");
        $stmt->bind_param("s", $a);
        $stmt->execute();   
        $this->lista();
    }
    

}



if(isset($_POST['acao'])){
    if($_POST['acao']==='apagar'){
        
        $obj=new clienteController();
        $a=$_POST['id'];
         $obj->apagarCliente($a);
        
    }elseif ($_POST['acao']==='cadastrar') {
        
        $obj=new clienteController();
        $b=$_POST['stockId'];
        $c=$_POST['nomeCliente'];
        $d=$_POST['preco'];
        $e=$_POST['quantidade'];
        
        $obj->cadastro($b, $c, $d,$e);
        
        
    }elseif ($_POST['acao']==='update') {
        $obj=new clienteController();
        
        $a=$_POST['id'];
        $b=$_POST['stockId'];
        $c=$_POST['nomeCliente'];
        $d=$_POST['preco'];
        $e=$_POST['quantidade'];
        $f=$_POST['cod'];
        $obj->updateCliente($b,$c,$d,$e,$f);
        
    }
}