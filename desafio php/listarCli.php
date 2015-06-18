<?php require "seguranca.php"; ?>
<?php
   require "conexao.php";
   include "menu.php";

   $sql = "Select * From clientes where 1 = 0";

   $resultado = mysqli_query($con, $sql);

   if(!$resultado){
   	  echo"Nenhum cadastro encontrado".mysqli_error();
   	  echo $sql;
   	  exit;
   }  ?>

   <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>CPF</th>
      </tr>
    </thead>
    <tbody>

   <?php
   if(mysqli_num_rows($resultado)>0){
   	while($row = mysqli_fetch_assoc($resultado)){
   	?>
   	   <tr>
   	     <td><?php echo $row['idCli']; ?></td>
   	     <td><?php echo $row['nomeCli']; ?></td>
   	     <td><?php echo $row['telCli']; ?></td>
   	     <td><?php echo $row['cpfCli']; ?></td>
   	     <td><a class="btn btn-primary" href="editar.php?idCli=<?php echo $row['idCli'];?>" role="button">Editar</a> <br></td>
   	   </tr>
   	 	<?php
   	}
   	?>
   		</tbody>
   	</table>
   	<?php
   }else{
   	?>
   		</tbody>
   	</table>
   	<?php
   	echo"<h1>SEM CLIENTES PARA LISTAGEM</h1>";
   }
    ?>
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="./lib/style.css" rel="stylesheet">

<a class="btn btn-primary btn-lg btn-block" href="menu.php" role="button">Inicio</a>


