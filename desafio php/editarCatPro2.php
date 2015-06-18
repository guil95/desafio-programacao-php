<?php
 require "seguranca.php";
if($_POST){
	require 'conexao.php';

   $nomeCatPro = $_POST['editarNomeCatPro'];
   $idCatPro =  $_POST['editarIdCatPro'];


  $sql = "Update categoriapro set nomeCatPro = '$nomeCatPro'
  where idCatPro = '$idCatPro'";

  $editar = mysqli_query($con, $sql);


     if($editar == false){
     	echo "Falha sql:" . mysqli_error($con);
     	echo $sql;
     	exit;
     }
     echo "Registro cadastrado";
     exit;

 }




 ?>
