<?php require "seguranca.php"; ?>
<?php
include "menu.php";
$idCli = '';

if($_POST){
	require "conexao.php";

	$idCli = $_POST['idCli'];

	$sql = "Insert into venda (idCli) values ('$idCli')";


	$cadastrar = mysqli_query($con, $sql);

   if($cadastrar == false){
   	echo "Erro SQL".mysqli_error();
   	echo $sql;
   	exit;
   }
   echo "Nova venda cadastrada"
   ?>


   <!DOCTYPE html>
   <html>
   <head>
   	<title></title>
   	<link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="./lib/style.css" rel="stylesheet">
   </head>
   <body>
   <div class="container-fluid">
   <form class="form-vertical">
   <div class="form-group">
   <div class="row">
     <div class="col-md-12"></div>
     <p class="text-center">
        <label class="control-label centro">Clique aqui para Baixar</label>
   		  <a class="btn btn-primary btn-block" href="baixar-venda.php">Baixar</a>
     </p>
   </div>
     </div>
    </form>
   </div>


   </body>
   </html><?php
   exit;
}

 ?>
