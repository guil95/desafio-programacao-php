<?php require "seguranca.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Vendas</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="./lib/style.css" rel="stylesheet">

</head>
<body>

<?php require "menu.php"; ?>

<div class="container-fluid">
<p class="text-center centro"><span class="glyphicon glyphicon-shopping-cart"></span></p>
	<form class="form-vertical" name="formCli" action="criar-venda.php" method="post">
       <?php
        require "conexao.php";
         $sql2 = "Select max(idVenda)+1 from venda";

         $resultado = mysqli_query($con, $sql2);
         $resultado2 = mysqli_fetch_assoc($resultado);
         //print_r($resultado2['max(idVenda)+1']);

      ?>


    <p class="text-center">
    <h4>Cliente</h4>
    <select class="form-control" name="idCli">
    <?php


         $sql = "select * from clientes";

         $resultado = mysqli_query($con, $sql);

         if(!$resultado){
         	echo "Nenhum resultado encontrado";
         	exit;
         }
    if(mysqli_num_rows($resultado)>0){
    while($row = mysqli_fetch_assoc($resultado)){
     ?>
        <option  value="<?php echo $row['idCli'];?>" ><?php echo "ID :".$row['idCli']." Nome: ". $row['nomeCli']."  Cpf: ".$row['cpfCli']; ?></option>
     <?php }
     } ?>
     </select>



     <br>

	</p>
   <br>
   <div class="form-group">
    <div class="col-md">
      <button class="btn btn-success btn-block" type="submit">Faturar</button>
    </div>
    <br>


 </form>
 <br>
    <div class="col-md">
    <a href="listar-vendas.php" class="btn btn-primary btn-block">Listar Vendas</a>
	</div>

</div>
<script>
     var menu = document.getElementById("link-cadastrarVenda");
     menu.className = "active";
</script>
<style>
     .centro{
      font-size: 70px;
      font-weight: bold;
     }
   </style>
</body>
</html>
