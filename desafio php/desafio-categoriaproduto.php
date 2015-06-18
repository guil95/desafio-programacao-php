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
  <p class="text-center centro"><span class="glyphicon glyphicon-shopping-cart"></span></p>
<form class="form-vertical" name="formCli" action="cadastro-categoria.php" method="post">
    <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Nome da categoria</label>
        </div>
        <div class="col-md-9">
      	 <input type="text" value="" class="form-control" name="nomeCatPro" required>
        </div>
       </div>
   </div>
<br><br><br>
	<div class="row">
	<div class="col-md-12">
      <button class="btn btn-success btn-block" type="submit">Cadastrar</button>
    </div>
  </div>
 </form>
 <br>
  <div class="row">
     <div class="col-md-12">
       <form class="form-vertical" name="formCli" action="listarCategoriaPro.php" method="post">
          <button class="btn btn-primary btn-block" type="submit">Listar</button>
       </form>
     </div>
   </div>
 </div>
 <script>

     var menu = document.getElementById("link-catPro");
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
