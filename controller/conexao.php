<?php
require_once("Configuracao.php");

	 function conexao(){
		$con=new mysqli(servidor,usuario,senha,banco);

		if(!$con){
			echo "Erro ao tentar conectar com a base de dados";
		}else{
			return $con;
		}

	}

  function fecharConexao(){
    $con=new mysqli(servidor,usuario,senha,banco);
    $con=mysql_close();
  }

