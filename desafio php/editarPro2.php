<?php require "seguranca.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./lib/style.css" rel="stylesheet">
</head>
<body>
<?php

include "menu.php";
 if($_POST){
  require 'conexao.php';

   $nomePro = $_POST['editarNomePro'];
   $idPro =  $_POST['editarIdPro'];
   $qtdPro = $_POST['editarQtdPro'];
   $valorPro = $_POST['editarValorPro'];


  $sql = "Update produtos set nomePro = '$nomePro', qtd = '$qtdPro', valor = '$valorPro'
  where idPro = '$idPro'";

  $editar = mysqli_query($con, $sql);


     if($editar == false){
      echo "Falha sql:" . mysqli_error($con);
      echo $sql;
      exit;
     }
     //echo "Registro cadastrado";
     ?>
     <?php echo "Cadastro realizado com sucesso";

     exit;
}

 ?>

</body>
</html>
