<?php
require "seguranca.php";
require "conexao.php";

include  "menu.php";
if(isset($_GET)){
	$idCli = $_GET['idCli'];
	$sql = "Select * From clientes where idCli = " . $idCli;

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
    <form class="form-vertical" name="formCli" action="editarCli.php" method="post">
   <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Id cliente</label>
        </div>
        <div class="col-md-8">
      	 <input type="text" value="<?php  echo $row['idCli']; ?>" class="form-control" name="editarIdCli" required readonly="readonly">
        </div>
       </div>
   </div>
   <br>
    <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Nome do cliente</label>
        </div>
        <div class="col-md-8">
      	 <input type="text" value="<?php echo $row['nomeCli']; ?>" class="form-control" name="editarNomeCli" required>
        </div>
       </div>
   </div>
<br>
  <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">CPF do cliente</label>
        </div>
        <div class="col-md-8">
      	 <input type="text" value="<?php  echo $row['cpfCli']; ?>" class="form-control" name="editarCpfCli" required>
        </div>
       </div>
   </div>
   <br>
    <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Telefone</label>
        </div>
        <div class="col-md-8">
      	 <input type="number" value="<?php  echo $row['telCli']; ?>" class="form-control" name="editarTelCli" required>
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
      <a class="btn btn-primary btn-lg btn-block" href="desafio-clientes.html" role="button">Inicio</a>
   </div>
</div>

 </form>
 </div>
 </body>
 </html>
