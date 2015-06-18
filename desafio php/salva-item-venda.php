<?php require "seguranca.php"; ?>
   <!DOCTYPE html>
   <html>
   <head>
    <title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./lib/style.css" rel="stylesheet">
   </head>
   <body>
   <div class="container-fluid">
   <?php

  require "conexao.php";


   $idVenda ='';
   $idPro = '';
   $preco = '';
   $qtd = '';
  $status = '';
  $controle = '';

 if($_POST){
   $idVenda = $_POST['idVenda'];
   $idPro = $_POST['idPro'];
   $preco = $_POST['preco'];
   $qtd = $_POST['qtd'];



 $sqlStatus = "Select status from venda where idVenda = $idVenda";

  $resultadoStatus = mysqli_query($con, $sqlStatus);
  $statusTeste = mysqli_fetch_assoc($resultadoStatus);
   if($statusTeste['status']!=0){
    ?>
     <?php require "menu.php" ?>
    <p class="text-center centro"><span class="glyphicon glyphicon-alert "></span>Venda fechada!<span class="glyphicon glyphicon-alert "></span></p>
    <style>
       .centro{
        margin-top: 70px;
    font-size: 50px;
    font-style: italic;
    font-weight: bold;
    color:red;
  }</style>

    <?php
    exit;
  }?>
  <?php


    $sql3 = "Select (produtos.qtd + ifnull(itemvenda.qtd, 0)) as qtd from produtos left join itemvenda on itemvenda.idPro = produtos.idPro and itemvenda.idVenda = $idVenda where produtos.idPro = $idPro";

    $testeqtd = mysqli_query($con, $sql3);

    $selectqtd = mysqli_fetch_assoc($testeqtd);

    print_r($selectqtd);

    if(($selectqtd['qtd'] < 0) or ($selectqtd['qtd'] < $qtd) or ($qtd < 0) ){
      echo "Sem produtos";
      ?>       <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
               <link href="./lib/style.css" rel="stylesheet">
      <p class="text-center">Clique aqui para cadastrar produtos<br><a href="listarPro.php" class="btn btn-primary btn-block">Cadastrar Produtos</a></p><?php
      exit;
    }


    $sql2 = "Update produtos set qtd = {$selectqtd['qtd']} - $qtd where idPro = $idPro";

   $alteraqtd = mysqli_query($con, $sql2);

    $sql3 = "delete from itemvenda where idVenda = $idVenda and idPro = $idPro";

    $resultado3 = mysqli_query($con, $sql3);


   $sql = "Insert into itemvenda (idVenda, idPro, preco, qtd) values ('$idVenda','$idPro','$preco','$qtd')";



   $resultado = mysqli_query($con, $sql);
   if($resultado == false){?>
   	<p class="text-center estilo"><span class="glyphicon glyphicon-alert"></span> Produto ja foi incluido <span class="glyphicon glyphicon-alert"></span></p>
    <style>
        .estilo{
          font-size: 70px;
          font-family:monospace;
          font-weight: bold;
          color:red;
        }
    </style>
    <a class="btn btn-primary btn-lg btn-block" href="baixar-venda.php?idVenda=<?php echo $idVenda ?>" role="button">Incluir itens</a>
   	<?php
    exit;
   }
   header("location: detalhesVenda.php?idVenda=$idVenda");
  ?>
  </div>
   </body>
   </html>
   <?php

}




 ?>
