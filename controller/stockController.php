<?php

include_once 'produtoController.php';

class stockController {
    
     public function cadastro($a,$b,$c){
        $bd= conexao();
        $stmt=$bd->prepare("INSERT INTO `stock`(`id_produto`, `preco`, `quantidade`)  VALUES(?,?,?)");
        $stmt->bind_param("sss", $a,$b,$c);
        $stmt->execute(); 
        $this->lista();
    }
    
    public function getStock(){
        $bd=Conexao();
   $sql="SELECT stock.id,stock.id_produto,stock.preco,stock.quantidade,produto.foto FROM stock CROSS JOIN produto WHERE stock.id_produto=produto.id";
   $resultado=$bd->query($sql);
   $grupo = array();
   while ($row=mysqli_fetch_array($resultado)) {
       $grupo[]=$row;
       # code...
   }
   return $grupo;

}
public function getProdutoDescricao($a){
        $bd=Conexao();
  $sql = "SELECT produto.descricao FROM produto JOIN stock ON produto.id = stock.id_produto WHERE produto.id = ?";
        // Prepara a consulta
        $stmt = $bd->prepare($sql);
        // Vincula o parâmetro
        $stmt->bind_param("i", $a);
        // Executa a consulta
        $stmt->execute();
        // Armazena o resultado
        $result = $stmt->get_result();
        // Verifica se a consulta retornou resultados
        if ($result->num_rows > 0) {
            // Percorre os resultados e imprime o valor
            while ($row = $result->fetch_assoc()) {
                $res=$row["descricao"];
            }
           return $res;
        }
}
public function lista(){
     $lista= $this->getStock();
        foreach ($lista as $list){
            echo ' <tr>
                            <td class="text-center"><b> '.$list['id'].'</b></td>
                            <td> '.$list['id_produto'].'</td>
                            <td>'.$list['preco'].'</td>
                            <td>'.$list['quantidade'].'</td>
                            
                            <td class="text-center">
                            <a href="" class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target="#update" data-whatever1="'. $list['id'].'" data-whatever2="'.$list['id_produto'].'" data-whatever3="'.$list['preco'].'" data-whatever4="'.$list['quantidade'].'">Update</a>
                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#apagar"  data-whatever1="'. $list['id'].'">Delete</a>
                            </td>
                        </tr>';
        }
}

public function apagarStock($a){
        $bd= conexao();
        $stmt=$bd->prepare("DELETE FROM `stock` WHERE `id`=?");
        $stmt->bind_param("s", $a);
        $stmt->execute(); 
        $this->lista();
    }
    
    public function updateStock($a,$b,$c,$d){
        $bd= conexao();
        $stmt=$bd->prepare("UPDATE `stock` SET `id_produto`=?,`preco`=?,`quantidade`=? WHERE `id`=?");
        $stmt->bind_param("ssss", $a,$b,$c,$d);
        $stmt->execute();
        $this->lista();
        echo 'TESTE';
    }
}


if(isset($_POST['acao'])){
    if($_POST['acao']==='apagar'){
        
        $obj=new stockController();
        $a=$_POST['id'];
         $obj->apagarStock($a);
        
    }elseif ($_POST['acao']==='cadastrar') {
        $obj=new stockController();
        $b=$_POST['stockId'];
        $c=$_POST['nomeCliente'];
        $d=$_POST['preco'];
        
        $obj->cadastro($b, $c, $d);
        
        
    }elseif ($_POST['acao']==='update') {
         $obj=new stockController();
        
        $a=$_POST['id'];
        $b=$_POST['stockId'];
        $c=$_POST['nomeCliente'];
        $d=$_POST['preco'];
        $obj->updateStock($b, $c, $d, $a);
        echo "Actualizar4" ,$a;
    }
}