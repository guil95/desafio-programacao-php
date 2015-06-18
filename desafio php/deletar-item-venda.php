<?php
require "conexao.php";
require "seguranca.php";
$idPro = '';
$idVenda = '';
$qtd = '';
   if(isset($_GET)){
      $idPro = $_GET['idPro'];
      $idVenda = $_GET['idVenda'];
      $qtd = $_GET['qtd'];

      $sql="delete from  itemvenda where itemvenda.idVenda = $idVenda and itemvenda.idPro = $idPro";
      $resultado = mysqli_query($con, $sql);
      if(!$resultado){
      	echo $sql;
      }
      $sql2 = "update produtos set qtd = qtd + $qtd where idPro = $idPro";
      $resultado2 = mysqli_query($con, $sql2);
      if(!$resultado2){
          echo $sql;
      }

      header("location:detalhesVenda.php?idVenda=$idVenda");
   }

?>
