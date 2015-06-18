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
  require "conexao.php";
  include "menu.php";

  $sql = "Select * from produtos left join categoriapro on produtos.categoria = categoriapro.idCatPro";

  $resultado = mysqli_query($con,$sql);

      if(!$resultado){
      echo"Nenhum cadastro encontrado".mysqli_error();
      echo $sql;
      exit;
   } ?>
   <!DOCTYPE html>
   <html>
   <head>
    <title>Lista de clientes</title>
   </head>
   <body>
     <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor</th>
        <th>Categoria</th>
      </tr>
    </thead>
    <tbody>
   <?php
   if(mysqli_num_rows($resultado)>0){
    while($row = mysqli_fetch_assoc($resultado)){
    ?>
       <tr>
         <td><?php echo $row['idPro']; ?></td>
         <td><?php echo $row['nomePro']; ?></td>
         <td><?php echo $row['qtd']; ?></td>
         <td><?php echo $row['valor']; ?></td>
         <td><?php echo $row['nomeCatPro'] ?></td>

         <td><a class="btn btn-primary" href="editarPro.php?idPro=<?php echo $row['idPro'];?>" role="button">Editar</a> <br></td>
       </tr>

      <?php
    }
    ?>
      </tbody>
    </table>
    <?php
   }else{
    ?>

    <?php
    echo"<h1>SEM VENDAS PARA LISTAGEM</h1>";
   }
    ?>
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./lib/style.css" rel="stylesheet">

     <a class="btn btn-primary btn-lg btn-block" href="index.php" role="button">Inicio</a>
   </body>
   </html>
