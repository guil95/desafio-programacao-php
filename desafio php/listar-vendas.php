<?php require "seguranca.php"; ?>
<?php
   require "conexao.php";
   include "menu.php";

   $sql = "Select idVenda, nomeCli, status, dtVenda from venda inner join clientes on venda.idCli = clientes.idCli order by idVenda
   desc";

   $resultado = mysqli_query($con, $sql);

     if(!$resultado){
   	  echo"Nenhum cadastro encontrado".mysqli_error();
   	  echo $sql;
   	  exit;
   } ?>
   <!DOCTYPE html>
   <html>
   <head>
   	<title>Lista de clientes</title>
      <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./lib/style.css" rel="stylesheet">
   </head>
   <body>
   <p class="text-center centro">Lista de Vendas</p>
     <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th><p class="text-center">Venda</p></th>
        <th><p class="text-center">Cliente</p></th>
        <th><p class="text-center">Situacao</p></th>
        <th><p class="text-center">Data</p></th>
      </tr>
    </thead>
    <tbody>
   <?php
   if(mysqli_num_rows($resultado)>0){
   	while($row = mysqli_fetch_assoc($resultado)){
   	?>
   	   <tr>
         <td><p class="text-center"><?php echo $row['idVenda']; ?></p></td>
         <td><p class="text-center"><?php echo $row['nomeCli']; ?></p></td>
         <td><?php if($row['status']==0){
          ?><p class="text-center">Aberta <span class="glyphicon glyphicon-ok-circle open"></span></p>
               <style>
                 .open{
                  color:green;
                 }
                </style>
          <?php

          }else if($row['status']!=0){
              ?><p class="text-center">Fechada <span class="glyphicon glyphicon-remove-circle fechada"></span></p>
                <style>
                 .fechada{
                  color:red;
                 }
                </style>

              <?php

            } ?></td>
            <td><p class="text-center"><?php echo $row['dtVenda']; ?></p></td>
         <td>
          <?php  if($row['status']!=0){
           ?>--<?php
      }else{?><a class="btn btn-success" id="botao" href="baixar-venda.php?idVenda=<?php echo $row['idVenda'];?>" role="button">Incluir item</a><?php } ?></td>
         <td><a class="btn btn-primary" href="detalhesVenda.php?idVenda=<?php echo $row['idVenda'];?>" role="button">Detalhes</a></td>
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
   	echo"<h1>SEM VENDAS PARA LISTAGEM</h1>";
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
