<?php require "seguranca.php"; ?>
<?php
require "conexao.php";
include "menu.php";

if(isset($_GET)){
	$idPro = $_GET['idPro'];
	$sql = "Select * From produtos where idPro = " . $idPro;

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
    <form class="form-vertical" name="formPro" action="editarPro2.php" method="post">
    <p class="text-center">
   <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Id do Produto</label>
        </div>
        <div class="col-md-8">
      	 <input type="text" value="<?php  echo $row['idPro']; ?>" class="form-control" name="editarIdPro" readonly="readonly">
        </div>
       </div>
   </div>
   <br>
    <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Nome do Produto</label>
        </div>
        <div class="col-md-8">
      	 <input type="text" value="<?php echo $row['nomePro']; ?>" class="form-control" name="editarNomePro" required>
        </div>
       </div>
   </div>
<br>
       <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Quantidade</label>
        </div>
        <div class="col-md-8">
         <input type="text" value="<?php echo $row['qtd']; ?>" class="form-control" name="editarQtdPro" required>
        </div>
       </div>
   </div>
   <br>
    <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Valor</label>
        </div>
        <div class="col-md-8">
         <input type="text" value="<?php echo $row['valor']; ?>" class="form-control" name="editarValorPro" required>
        </div>
       </div>
   </div>
   <br><br>
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
</p>
 </form>
 </div>
 </body>
 </html>
