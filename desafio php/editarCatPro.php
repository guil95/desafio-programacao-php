<?php
 require "seguranca.php";
require "conexao.php";
include "menu.php";
if(isset($_GET)){
	$idCatPro = $_GET['idCatPro'];
	$sql = "Select * From categoriapro where idCatPro = " . $idCatPro;

   $resultado = mysqli_query($con, $sql);

   if(!$resultado){
   	  echo"Nenhum cadastro encontrado".mysqli_error();
   	  echo $sql;
   	  exit;
   } else {
   		$row = mysqli_fetch_assoc($resultado);
   }
}else{
	echo"Nenhum dado encontrado";
	echo $sql;
}
      //require "listarCli.php";
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
    <form class="form-vertical" name="formCatPro" action="editarCatPro2.php" method="post">
   <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Id Categoria do Produto</label>
        </div>
        <div class="col-md-8">
      	 <input type="text" value="<?php  echo $row['idCatPro']; ?>" class="form-control" name="editarIdCatPro" readonly="readonly">
        </div>
       </div>
   </div>
   <br>
    <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Nome da categoria do Produto</label>
        </div>
        <div class="col-md-8">
      	 <input type="text" value="<?php echo $row['nomeCatPro']; ?>" class="form-control" name="editarNomeCatPro" required>
        </div>
       </div>
   </div>

<br>
 <div class="row">
  <div class="col-md">
      <button class="btn btn-success btn-lg btn-block" type="submit">Salvar</button>
    </div>
 </div>
 <br><br>
<div class="row">
   <div class="col-md">
      <a class="btn btn-primary btn-lg btn-block" href="index.php" role="button">Inicio</a>
   </div>
</div>
 </form>
 </div>
 </body>
 </html>
