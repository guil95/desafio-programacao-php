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
require "menu.php";
require "conexao.php";
     $idVenda = '';

     if($_GET){
     	$idVenda = $_GET['idVenda'];

     	$sql = "update venda set status = 1 where idVenda = $idVenda";
     	$resultado = mysqli_query($con, $sql);
     	?>
     	<p class="text-center centro">Venda Fechada com Sucesso  <span class="glyphicon glyphicon-ok salva"></span></p>
     	<style>
               .centro{
               	font-size: 40px;
               	font-style: normal;
               	font-family: fantasy;
               }
               .salva{
               		font-size: 40px;
               	font-style: normal;
               	font-weight: bold;

               	color: green;
               }
     	</style>
     	<?php
     }

 ?>

</body>
</html>
