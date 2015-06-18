<?php
require "seguranca.php";
include "menu.php";
   $nomeCli       = '';
   $cpfCli        = '';
   $telCli        = '';



   if($_POST){
      $nomeCli       = $_POST['nomeCli'];
      $cpfCli        = $_POST['cpfCli'];
      $telCli        = $_POST['telCli'];



    $sql = "Insert Into clientes  (nomeCli, cpfCli, telCli) values ('$nomeCli', '$cpfCli', '$telCli')";

    require "conexao.php";
     $cadastrar = mysqli_query($con, $sql);
	if ($cadastrar == false) {
		echo "Falha SQL: " . mysqli_error($con);
		echo $sql;
		exit;
	}
	echo "Registro cadastrado!";
	exit;
   }


 ?>
