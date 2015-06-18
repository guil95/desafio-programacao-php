<?php require "seguranca.php"; ?>
<?php
if($_POST){
	require 'conexao.php';

   $nomeCli = $_POST['editarNomeCli'];
   $telCli = $_POST['editarTelCli'];
   $cpfCli = $_POST['editarCpfCli'];
   $idCli = $_POST['editarIdCli'];


  $sql = "Update clientes set nomeCli = '$nomeCli', cpfCli = '$cpfCli', telCli = '$telCli'
  where idCli = '$idCli'";

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
