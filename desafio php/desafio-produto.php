<?php require "seguranca.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Desafio</title>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="./lib/style.css" rel="stylesheet">

</head>
<body>

<?php require "menu.php";?>
<div class="container-fluid">
<p class="text-center centro"><span class="glyphicon glyphicon-shopping-cart"></span></p>
    <form class="form-vertical" name="formCli" action="cadastro-produto.php" method="post">
    <div class="row">
       <div class="form-group">
        <div class="col-md-2">
         <label class="control-label">Nome do Produto</label>
        </div>
        <div class="col-md-8">
      	 <input type="text" value="" class="form-control" name="nomePro" required>
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
      	 <input type="number" value="" class="form-control" name="qtdPro" required>
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
      	 <input type="number" value="" class="form-control" name="valorPro" required>
        </div>
       </div>
   </div>
   <br>
   <div class="row">
   <div class="form-group">
   <div class="col-md-2">
    <label class="control-label">Categoria</label>
   </div>
   <div class="col-md-8">
       <select class="form-control" name="categoria">
         <?php
         require "conexao.php";

         $sql = "select * from categoriapro";

         $resultado = mysqli_query($con, $sql);

         if(!$resultado){
          echo "Nenhum resultado encontrado";
          exit;
         }
    if(mysqli_num_rows($resultado)>0){
    while($row = mysqli_fetch_assoc($resultado)){
     ?>
        <option  value="<?php echo $row['idCatPro'];?>" name="idCatPro" ><?php echo  $row['nomeCatPro']?></option>
     <?php }
     } ?>
     </select>
     </div>
   </div>
  </div>
<br>
<br>
 <div class="row">
	<div class="col-md-12">
      <button class="btn btn-success btn-block" type="submit">Cadastrar</button>
    </div>
  </div>
 </form>
 <br>
<div class="row">
     <div class="col-md-12">
     <a href="listarPro.php" class="btn btn-primary btn-block">Listar</a>

     </div>
   </div>
 </div>
</body>
<script >

     var menu = document.getElementById("link-produtos");
     menu.className = "active";


</script>
 <style>
     .centro{
      font-size: 70px;
      font-weight: bold;
     }
   </style>
</html>
