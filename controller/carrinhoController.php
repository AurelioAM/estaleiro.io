<?php
include_once 'vendaController.php';


/**
 * Description of carrinho
 *
 * @author Donaldo
 */
class carrinhoController {


    public function numLinhas(){
        $bd= conexao();
        $sql=$bd->query("SELECT * FROM venda");
        $cont= mysqli_num_rows($sql);
        return $cont+1;
    }
    
    public function items($a){
        $bd=Conexao();
        $sql = "SELECT * FROM `carrinho` WHERE  `codigo`= ?";
        // Prepara a consulta
        $stmt = $bd->prepare($sql);
        // Vincula o parâmetro
        $stmt->bind_param("i", $a);
        // Executa a consulta
        $stmt->execute();
        // Armazena o resultado
        $result = $stmt->get_result();
        // Verifica se a consulta retornou resultados
        
        return $result->num_rows;
  
    }
    public function precoTotalCarrinho($a){
        $bd=Conexao();
        $res=0;
        $sql = "SELECT * FROM `carrinho` WHERE  `codigo`= ?";
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
                $res+=$row['preco_total'];
            }
           return $res;
        }
  
    }
   
    
     public function cadastro($a,$b,$c){
         $cod_venda=$this->numLinhas();
         $cliente="Donaldo";
         $precoTotal=$c*$b;
         
        $bd= conexao();
        $stmt=$bd->prepare("INSERT INTO `carrinho`( `codigo`, `cod_cliente`, `descricao`, `qtd`, `preco`, `preco_total`)  VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $cod_venda,$cliente,$a,$c,$b,$precoTotal);
        $stmt->execute(); 
        //$u->cadastro($cod, $a, $b, $c);
       //$this->lista();
       
       
       
    }
    
    public function getCarrinho(){
        $bd=Conexao();
        $a= $this->numLinhas();
           $sql="SELECT * FROM `carrinho` WHERE `codigo`=$a";
           $resultado=$bd->query($sql);
           $grupo= array();
          
           while ($row=mysqli_fetch_array($resultado)) {
               $grupo[]=$row;
               # code...
           }
           return $grupo;

}

public function lista(){
     $lista= $this->getCarrinho();
        foreach ($lista as $list){
            echo ' <tr>
                            <td class="text-center"><b> '.$list['id'].'</b></td>
                            <td> '.$list['codigo'].'</td>
                                <td> '.$list['cod_cliene'].'</td>
                                    <td> '.$list['descricao'].'</td>
                                        <td> '.$list['qtd'].'</td>
                            <td>'.$list['preco'].'</td>
                             <td>'.$list['preco_total'].'</td>
                            
                            <td class="text-center">
                            <a href="" class="btn btn-sm btn-primary text-white" data-toggle="modal" data-target="#update" data-whatever1="'. $list['id'].'" data-whatever2="'.$list['codigo'].'" data-whatever3="'.$list['cod_cliente'].'"  data-whatever4="'. $list['descricao'].'" data-whatever5="'. $list['qtd'].'"  data-whatever6="'. $list['preco'].'" data-whatever7="'. $list['preco_total'].'">Update</a>
                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#apagar"  data-whatever1="'. $list['id'].'">Delete</a>
                            </td>
                        </tr>';
        }
}

public function apagarCarrinho($a){
        $b=new carrinhoController();
        $bd= conexao();
        $stmt=$bd->prepare("DELETE FROM `carrinho` WHERE `id`=?");
        $stmt->bind_param("s", $a);
        $stmt->execute();   
        $b->lista();
    }
    
    public function updateCarrinho($a,$b,$c,$d,$e,$f,$g){
       
        
        $bd= conexao();
        $stmt=$bd->prepare("UPDATE `carrinho` SET `codigo`=?,`cod_cliene`=?,`cod_produto`=?,`qtd`=?,`preco`=?,`preco_total`=? WHERE `id`=?");
        $stmt->bind_param("ssssss", $a,$b,$c,$d,$e,$f);
        $stmt->execute();
        
        //$this->lista();
       
        
      
       
    }
}


if(isset($_POST['acao'])){
    if($_POST['acao']==='apagar'){
         
        $obj=new carrinhoController();
        $a=$_POST['id'];
         $obj->apagarCarrinho($a);
      echo 'testando ->',$a;
        
    }elseif ($_POST['acao']==='addCarrinho') {
       $obj=new carrinhoController();
        $b=$_POST['stockId'];
        $c=$_POST['nomeCliente'];
        $d=$_POST['preco'];
       
        
        
        $obj->cadastro($b,$c,$d);
    
        
        
    }elseif ($_POST['acao']==='update') {
        $obj=new carrinhoController();
        
        $a=$_POST['id'];
        $b=$_POST['stockId'];
        $c=$_POST['nomeCliente'];
        $d=$_POST['preco'];
        $e=$_POST['quantidade'];
        $f=$_POST['precoTotal'];
        $g=$_POST['codigo'];
        $obj->updateCarrinho($b,$c,$d,$e,$f,$a,$g);
       
        
    }
    
}
    
    
    

