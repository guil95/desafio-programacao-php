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
$nomeCatPro = '';


   if($_POST){
      $nomeCatPro = $_POST['nomeCatPro'];


    $sql = "Insert Into categoriapro  (nomeCatPro) values ('$nomeCatPro')";

    require "conexao.php";
     $cadastrar = mysqli_query($con, $sql);
	if ($cadastrar == false) {
		echo "Falha SQL: " . mysqli_error($con);
		echo $sql;
		exit;
	}
	echo "Registro cadastrado!";
	exit;
   }




 ?>
</body>
</html>


