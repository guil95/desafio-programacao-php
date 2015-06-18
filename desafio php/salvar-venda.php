<?php require "seguranca.php"; ?>
<?php
include "menu.php";
   require "conexao.php";

   $idVenda = '';

   if($_POST){
      $idVenda = $_POST['idVenda'];
   }

   $sql = "Update venda  set status = 'f' where idVenda = '$idVenda'";

   $resultado = mysqli_query($con, $sql);

   if(!$resultado){
   	echo"Erro SQL".mysqli_error();
   	echo $sql;
   	exit;
   }else{?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>Venda salva</title>
     <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="./lib/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
         <p class = "text-center">
         	VENDA FECHADA COM SUCESSO
         </p>

        </div>
    </body>
    </html>


   <?php  }?>



