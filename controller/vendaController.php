<?php
include_once 'clienteController.php';

class vendaController {
    
     public function cadastro($a,$b,$c){
         $data= date("y.m.d");
        $bd= conexao();
        $stmt=$bd->prepare("INSERT INTO `venda`(`nomeCliente`, `itens`, `precoTotal`, `data`)  VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $a,$b,$c,$data);
        $stmt->execute(); 
        echo "<script>document.location='venda.php'</script>";
       echo 'cadastro de sucesso';
       
    }
    
    public function getVenda(){
        $bd=Conexao();
   $sql="SELECT * FROM `venda`";
   $resultado=$bd->query($sql);
   $grupo = array();
   while ($row=mysqli_fetch_array($resultado)) {
       $grupo[]=$row;
       # code...
   }
   return $grupo;

}
public function updateCliente($a,$b,$c,$d,$f){
        $bd= conexao();
        $stmt=$bd->prepare("UPDATE `cliente` SET `nome`=?,`endereco`=?,`email`=?,`telefone`=? WHERE `id`=?");
        $stmt->bind_param("sssss", $a,$b,$c,$d,$f);
        $stmt->execute();   
    }
public function lista(){
     $lista= $this->getVenda();
        foreach ($lista as $list){
            echo ' <tr>
                            <td class="text-center"><b> '.$list['id'].'</b></td>
                            <td> '.$list['id_stock'].'</td>
                                <td> '.$list['nomeCliente'].'</td>
                                    <td> '.$list['preco'].'</td>
                                        <td> '.$list['quantidade'].'</td>
                            <td>'.$list['precoTotal'].'</td>
                            
                            <td class="text-center">
                            <a href="" class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target="#update" data-whatever1="'. $list['id'].'" data-whatever2="'.$list['id_stock'].'" data-whatever3="'.$list['nomeCliente'].'"  data-whatever4="'. $list['preco'].'" data-whatever5="'. $list['quantidade'].'"  data-whatever6="'. $list['precoTotal'].'">Update</a>
                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#apagar"  data-whatever1="'. $list['id'].'">Delete</a>
                            </td>
                        </tr>';
        }
}

public function apagarVenda($a){
        $bd= conexao();
        $stmt=$bd->prepare("DELETE FROM `venda` WHERE `id`=?");
        $stmt->bind_param("s", $a);
        $stmt->execute();   
        $this->lista();
    }
    
    public function updateVenda($a,$b,$c,$d,$e,$f){
        $bd= conexao();
        $stmt=$bd->prepare("UPDATE `venda` SET `id_stock`=?,`nomeCliente`=?,`preco`=?,`quantidade`=?,`precoTotal`=? WHERE `id`=?");
        $stmt->bind_param("ssssss", $a,$b,$c,$d,$e,$f);
        $stmt->execute();
        $this->lista();
      
       
    }
}


if(isset($_POST['acao'])){
    if($_POST['acao']==='apagar'){
        
        $obj=new vendaController();
        $a=$_POST['id'];
         $obj->apagarVenda($a);
        
    }elseif ($_POST['acao']==='cadastrar') {
        $obj=new vendaController();
        $b=$_POST['stockId'];
        $c=$_POST['nomeCliente'];
        $d=$_POST['preco'];
        $e=$_POST['quantidade'];
        $f=$_POST['precoTotal'];
        
        $obj->cadastro($b,$c,$d,$e,$f);
        
        
    }elseif ($_POST['acao']==='update') {
        $obj=new vendaController();
        
        $a=$_POST['id'];
        $b=$_POST['stockId'];
        $c=$_POST['nomeCliente'];
        $d=$_POST['preco'];
        $e=$_POST['quantidade'];
        $f=$_POST['precoTotal'];
        $obj->updateVenda($b,$c,$d,$e,$f,$a);
        
    }
    
}