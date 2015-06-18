<?php require "seguranca.php"; ?>
<!DOCTYPE html>
  <html>
   <head>
     <title></title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
       <link href="./lib/style.css" rel="stylesheet">
   </head>
   <body>
<?php
require "conexao.php";
require "menu.php";
$idVenda = '';
if($_GET){
  $idVenda = $_GET['idVenda'];
$sql = "Select (itemvenda.qtd*itemvenda.preco) as unitario,itemvenda.idVenda, clientes.nomeCli, itemvenda.idPro, produtos.nomePro, itemvenda.qtd from itemvenda inner join venda on itemvenda.idVenda = venda.idVenda inner join clientes on clientes.idCli = venda.idCli inner join produtos on produtos.idPro = itemvenda.idPro where itemvenda.idVenda = $idVenda";
       /*$sql = "Select sum(itemvenda.qtd*preco) total, itemvenda.idVenda, venda.idCli, clientes.nomeCli, itemvenda.qtd as itens, nomePro from itemvenda inner join venda on itemvenda.idVenda = venda.idVenda right join clientes on venda.idCli = clientes.idCli inner join produtos on produtos.idPro = itemvenda.idPro where venda.idVenda = $idVenda ";*/
       $resultado = mysqli_query($con, $sql);

     if(!$resultado){
   	  echo"Nenhum cadastro encontrado".mysqli_error();
   	  echo $sql;
   	  exit;
   }?>
   <!DOCTYPE html>

   <div class="container-fluid">
   <?php $resultado = mysqli_query($con, $sql);

     if(!$resultado){
      echo"Nenhum cadastro encontrado".mysqli_error();
      echo $sql;
      exit;
   }?><?php

   $row = mysqli_fetch_assoc($resultado);
     ?>


   <?php
   mysqli_data_seek($resultado, 0);
   if(mysqli_num_rows($resultado)>0){?>

    <p class="text-center tituloVenda" >Venda</p>
      <div class="row">
       <div class="col-md-6">
       <p class="text-center">
      <label class="control-label tituloVenda">Código</label>
         </p>
       </div>
       <div class="col-md-6">
       <p class="text-center">
          <label class="control-label tituloVenda">Cliente</label>
         </p>
       </div>
     </div>
     <!--DAQUI-->
     <div class="row">
       <div class="col-md-6">
       <p class="text-center">
       <input name="idVenda" value = "<?php echo $row['idVenda']; ?> "style="border:0;text-align:center;" class="codCliVenda">
         </p>
       </div>
       <div class="col-md-6">
       <p class="text-center">
       <input name="nomeCli" value = "<?php echo $row['nomeCli']; ?> "style="border:0;text-align:center;" class="codCliVenda">
         </p>
       </div>
     </div>
     <br>
       <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>idPro</th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Valor Unitario</th>


      </tr>
    </thead>
    <tbody><?php
    while($row = mysqli_fetch_assoc($resultado)){
    ?>
       <tr>
         <td><?php echo $row['idPro']; ?></td>
         <td><?php echo $row['nomePro']; ?></td>
          <td><?php echo $row['qtd']; ?></td>
         <td><?php echo $row['unitario']; ?></td>
         <td><a href="baixar-venda.php?idVenda=<?php echo $idVenda?>&idPro=<?php echo"{$row['idPro']}"?> " class="btn btn-primary">Alterar</a></td>
         <td><a href="#" class="btn btn-primary btnExcluir" data-idvenda="<?php echo $idVenda; ?>" data-idpro="<?php echo $row['idPro']; ?>">Deletar</a></td>
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
    flush();
    echo"SEM ITENS PARA LISTAGEM";

   }?>
   <?php $sql20 = "select sum(itemvenda.qtd*itemvenda.preco) as total from itemvenda inner join venda on itemvenda.idVenda = venda.idVenda inner join clientes on clientes.idCli = venda.idCli inner join produtos on produtos.idPro = itemvenda.idPro where itemvenda.idVenda = $idVenda";
      $resultadoTotal = mysqli_query($con, $sql20);

    ?>
   <table class="table table-bordered table-hover">

    <tbody>
   <?php
   if(mysqli_num_rows($resultadoTotal)>0){
    while($row2 = mysqli_fetch_assoc($resultadoTotal)){
    ?>
       <tr class="negrito">
         <td colspan="4" WIDTH=900 >Total </td>
         <td WIDTH=300 class="total" ><?php echo $row2['total'].",00"; ?></td>
         <?php //print_r($row2); ?>

       </tr>
      <?php
    }
    ?>
      </tbody>
    </table>
    <?php
   }
    ?>
    <?php

    }?>

 <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="./lib/style.css" rel="stylesheet">
<br><br>

 <?php $sqlS = "Select status from venda where idVenda = $idVenda";
       $resultadoStatus = mysqli_query($con, $sqlS);
       $status = mysqli_fetch_assoc($resultadoStatus);

       if($status['status']!=0){
          ?>
              <script>
                   document.getElementById("botao").style.display = "none";
                   document.getElementById("botao2").style.display = "none";
              </script>
          <?php
       }else{
?>
<a class="btn btn-primary btn-lg btn-block " id="botao" href="baixar-venda.php?idVenda=<?php echo $idVenda ?>" role="button">Incluir itens</a>
<br>
<a class="btn btn-success btn-lg btn-block" id="botao2" href="fechar-venda.php?idVenda=<?php echo $idVenda ?>" role="button">Fechar Venda</a>
<?php } ?>
  </div>
<style>
  .negrito{
    font-weight: bold;
  }
  .total{
    background-color: green;
    color:white;
  }
   .centro{
    font-size: 50px;
    font-style: italic;
    font-weight: bold;
    color:red;
  }
  .tituloVenda{
  font-size: 40px;
  font-weight: bold;

}

  .cor{
    background-color: blue;
    font-weight: bold;
    color:white;
  }
  .codCliVenda{
     font-size: 30px;
      background-color: blue;
      font-weight: bold;
      color:white;
  }

</style>
<script>
  var btnsExcluir = document.querySelector(".btnExcluir");
  if (btnsExcluir) {
    btnsExcluir.addEventListener("click", deletarItem);
  }

  function deletarItem(e){
    e.preventDefault();
    var r = confirm("Deseja deletar item da venda ?");
    if(r == true){
        var idVenda = this.dataset.idvenda;
        var idPro = this.dataset.idpro;
        window.location.href = 'deletar-item-venda.php?idVenda='+idVenda+'&idPro='+idPro;
    }
  };

</script>

   </body>
   </html>


