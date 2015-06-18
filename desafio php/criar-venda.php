<?php
 require "seguranca.php";
    require "conexao.php";
    if($_POST) {


       $idCli   = $_POST['idCli'];

       $sql   = "Insert into venda (idCli, status) values ('$idCli',0)";


       $cadastrou = mysqli_query($con, $sql);

   	   if($cadastrou== false){
          echo "Erro SQL".mysqli_error();
          echo $sql;
          exit;
        }else{
        	$idVenda = mysqli_insert_id($con);
        	header("location: baixar-venda.php?idVenda=$idVenda");
        	exit;
        }
    }
 ?>
