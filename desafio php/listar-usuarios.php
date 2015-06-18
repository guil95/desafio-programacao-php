<?php require "seguranca.php"; ?>
<?php
   require "conexao.php";
   include "menu.php";

   $sql = "Select * from usuario";

   $resultado = mysqli_query($con, $sql);

     if(!$resultado){
   	  echo"Nenhum cadastro encontrado".mysqli_error();
   	  echo $sql;
   	  exit;
   } ?>
   <!DOCTYPE html>
   <html>
   <head>
   	<title>Lista de Usuários</title>
      <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./lib/style.css" rel="stylesheet">
   </head>
   <body>
   <p class="text-center centro">Lista de Usuarios</p>
     <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th><p class="text-center">Nome</p></th>
        <th><p class="text-center">Email</p></th>
      </tr>
    </thead>
    <tbody>
   <?php
   if(mysqli_num_rows($resultado)>0){
   	while($row = mysqli_fetch_assoc($resultado)){
   	?>
   	   <tr>
         <td><p class="text-center"><?php echo $row['nome']; ?></p></td>
         <td><p class="text-center"><?php echo $row['email']; ?></p></td>
         <td><a class="btn btn-primary" href="editar-usuarios2.php?idUsuario=<?php echo $row['idUsuario'] ?>" role="button">Editar</a> <br></td>
   	   </tr>

   	 	<?php
   	}
   	?>
   		</tbody>
   	</table>
   	<?php
   }else{
   	?>

   	<?php
   	echo"<h1>SEM USUÁRIOS PARA LISTAGEM</h1>";
   }
    ?>
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="./lib/style.css" rel="stylesheet">

     <a class="btn btn-primary btn-lg btn-block" href="index.php" role="button">Inicio</a>
     <style>
       .centro{
        font-size: 40px;
        font-family: cursive;
        font-weight: bold;
       }
     </style>


   </body>
   </html>
