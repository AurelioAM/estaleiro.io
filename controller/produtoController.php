<?php
include_once 'conexao.php';

class produtoController {
    
     public function cadastro($b,$c,$d){
         
       /* $bd= conexao();
        $stmt=$bd->prepare("INSERT INTO `produto`(`nome`, `descricao`,`foto`)  VALUES(?,?,?)");
        $stmt->bind_param("sss", $b,$c,$d);
        $stmt->execute(); 
        $this->lista();*/
       
    }
    
    public function getTurma(){
        $bd=Conexao();
   $sql="SELECT * FROM `produto`";
   $grupo = array();
   $resultado=$bd->query($sql);
   while ($row=mysqli_fetch_array($resultado)) {
       $grupo[]=$row;
       # code...
   }
   return $grupo;

}
public function lista(){
     $lista= $this->getTurma();
        foreach ($lista as $list){
            echo ' <tr>
                            <td class="text-center"><b> '.$list['id'].'</b></td>
                            <td> '.$list['nome'].'</td>
                            <td>'.$list['descricao'].'</td>
                            
                            <td class="text-center">
                            <a href="" class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target="#update" data-whatever1="'. $list['id'].'" data-whatever2="'.$list['nome'].'" data-whatever3="'.$list['descricao'].'">Update</a>
                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#apagar"  data-whatever10="'. $list['id'].'">Delete</a>
                            </td>
                        </tr>';
        }
}

public function apagarProduto($a){
        $bd= conexao();
        $stmt=$bd->prepare("DELETE FROM `produto` WHERE `id`=?");
        $stmt->bind_param("s", $a);
        $stmt->execute();   
        $this->lista();
    }
    
    public function updateProduto($a,$b,$c){
        $bd= conexao();
        $stmt=$bd->prepare("UPDATE `produto` SET `nome`=?,`descricao`=? WHERE id=?");
        $stmt->bind_param("sss", $b,$c,$a);
        $stmt->execute();
        $this->lista();
        
       
    }
}


if(isset($_POST['acao'])){
    if($_POST['acao']==='apagar'){
        $obj=new produtoController();
        $a=$_POST['id'];
         $obj->apagarProduto($a);
        
        echo 'O nosso if foi bem sucedido ->',$a;
        
    }elseif ($_POST['acao']==='cadastrar') {
       /* $c = $_FILES["foto"]["name"];
         $d = $_FILES["foto"]["tmp_name"];    
         $folder = "../img".$filename;
        $obj=new produtoController();
        $a=$_POST['nome'];
        $b=$_POST['descricao'];*/
        $c=$_POST['foto'];
        
        echo"foto->",$c;
        
       // $obj->cadastro($a, $b,$c,$d);
        
        
    }elseif ($_POST['acao']==='update') {
        $obj=new produtoController();
        
        $a=$_POST['id'];
        $b=$_POST['nome'];
        $c=$_POST['descricao'];
        $obj->updateProduto($a, $b,$c);
        
    }
}