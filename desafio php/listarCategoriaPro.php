<?php require "seguranca.php"; ?>
<?php
   require "menu.php";
   require "conexao.php";

   $sql = "Select * From categoriapro";

   $resultado = mysqli_query($con, $sql);

   if(!$resultado){
   	  echo"Nenhum cadastro encontrado".mysqli_error();
   	  echo $sql;
   	  exit;
   }  ?>
   <!DOCTYPE html>
   <html>
   <head>
     <title></title>
   </head>
   <body>
        <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome da Categoria</th>

      </tr>
    </thead>
    <tbody>
   <?php
   if(mysqli_num_rows($resultado)>0){
    while($row = mysqli_fetch_assoc($resultado)){
    ?>

       <tr>
         <td><?php echo $row['idCatPro']; ?></td>
         <td><?php echo $row['nomeCatPro']; ?></td>
         <td><a class="btn btn-primary" href="editarCatPro.php?idCatPro=<?php echo $row['idCatPro'];?>" role="button">Editar</a> <br></td>
       </tr>

      <?php
    }
   }else{
    echo"<h1>SEM CATEGORIAS PARA LISTAGEM</h1>";
   }

    ?>
    </tbody>
    </table>
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./lib/style.css" rel="stylesheet">
<a class="btn btn-primary btn-lg btn-block" href="index.php" role="button">Inicio</a>

   </body>
   </html>
