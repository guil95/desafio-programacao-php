<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./lib/style.css" rel="stylesheet">
    <title>Desafio</title>

    <style type="text/css">


          .container {
            max-width: 330px;
          }

          form { margin-bottom: 15px; }
    </style>
  </head>
  <body>

<?php
      require "seguranca.php";
      require "conexao.php";
  $nomeU = "";
  $senhaU = "";
  $emailU = "";
  $idUsuario = "";

  if(isset($_POST)){

    $emailU = $_POST['email'];
    $senhaU = $_POST['senha'];
    $idUsuario = $_POST['idUsuario'];
    $nomeU = $_POST['nome'];

    $sql = "Update usuario set nome = '$nomeU', senha = '$senhaU', email = '$emailU', senha = '$senhaU' where idUsuario = $idUsuario";
    $resultado = mysqli_query($con, $sql);
    if(!$resultado){
    	echo "ERRO ".mysqli_error();
    	echo $sql;
    	exit;
    }else{
    }
?>

     <?php require "menu.php"; ?>
     <p class="text-center centro">Usuário atualizado com sucesso<span class="glyphicon glyphicon-ok salva"></span></p>
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
    </body>
    </html>
<?php
  }

 ?>

