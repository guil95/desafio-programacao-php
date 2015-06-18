
<?php
require "seguranca.php";
$nome = "";
if(isset($_SESSION['logado'])){
  $nome = $_SESSION['nome'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Desafio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="./lib/style.css" rel="stylesheet">
</head>
<body>
 <?php
   require "menu.php";
  ?>
  <p class="text-center centro">HIVE TI <small>Soluções web</small></p>
  <p class="text-center centro"><span class="glyphicon glyphicon-thumbs-up"></span></p>
  <p class="text-center Bem-vindo"><small>Bem vindo <?php echo $nome;?></small></p>

  <style>
    .centro{
    	margin-top: 40px;
    	font-family: cursive;
    	color:black;
    	font-weight: bold;
    	font-size: 70px;
    }
    .Bem-vindo{
    	margin-top: 40px;
    	font-family: cursive;
    	color:gray;
    	font-weight: bold;
    	font-size: 50px;
    }
  </style>
  <script>
 var menu = document.getElementById("link-home");
     menu.className = "active";

  </script>
</body>
</html>

