<?php require "seguranca.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Desafio</title>
	<link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="./lib/style.css" rel="stylesheet">

</head>
<body>
<?php require "menu.php"; ?>
<div class="container-fluid">
<p class="text-center centro"><span class="glyphicon glyphicon-user"></span></p>
    <form class="form-vertical" name="formCli" action="cadastro-cli.php" method="post">
    <p class="text-center">
    <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Nome do cliente</label>
        </div>
        <div class="col-md-8">
      	 <input type="text" value="" class="form-control" name="nomeCli" required>
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
      	 <input type="text" value="" class="form-control" name="cpfCli" required>
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
      	 <input type="number" value="" class="form-control" name="telCli" required>
        </div>
       </div>
   </div>
	</p>
   <br>
   <p class="text-center">
 <div class="row">
	<div class="col-md-12">
      <button class="btn btn-success btn-block" type="submit">Cadastrar</button>
    </div>
  </div>
  <br>

	</p>
  </form>
     <div class="row">
    <div class="col-md-12">
       <form class="form-vertical" name="formCli" action="listarCli2.php" method="post">
          <button class="btn btn-primary btn-block" type="submit">Listar</button>
       </form>
     </div>
   </div>
   </div>
   <script>
     var menu = document.getElementById("link-clientes");
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
