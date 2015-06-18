<?php require "seguranca.php"; ?>
   <?php
   include "menu.php";
   $idVenda = "";
   if(isset($_POST['status'])){
    $status = 1;
   }else{
    $_POST['status'] = 0;
   }

  require "conexao.php";



  if($status == '1'){
      $sql4 = "Update venda set status ='$status' where idVenda = '$idVenda'";
      $statusSql = mysqli_query($con, $sql4);
      echo('Venda fechada!');
      exit;
     }

     $sql5 = "Select status from venda where idVenda = '$idVenda'";
     $testaStatus = mysqli_query($con, $sql5);

     $testandoStatus = mysqli_fetch_assoc($testaStatus);
     //var_dump($testandoStatus);
     if($testandoStatus["status"] == '1'){
      echo "Venda Fechada";
      exit;
     }

    ?>


