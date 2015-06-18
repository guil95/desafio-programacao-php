<?php require "seguranca.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Vendas</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./lib/style.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid">
  <form class="form-vertical" name="formIncluirItem" action="salva-item-venda.php" method="post">

<?php
date_default_timezone_set("America/Sao_Paulo");?>
<?php require "menu.php";
$idCli = '';
$status = 0;
$controle = '';
$idVenda = '';
require "conexao.php";

 if($_GET){

  $idPro = null;
  if (isset($_GET['idPro'])) {
    $idPro = $_GET['idPro'];
  }
  $idVenda = $_GET['idVenda'];
    $sql = "select nomeCli, idVenda from venda inner join clientes on venda.idCli = clientes.idCli where status !=1 and idVenda = '$idVenda' order by idVenda ";

         $resultado = mysqli_query($con, $sql);

         if(!$resultado){
          echo "Nenhum resultado encontrado";
          exit;
         }
    if(mysqli_num_rows($resultado)>0){
    while($row = mysqli_fetch_assoc($resultado)){
     ?>
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

       <!--<option  value="<?php //echo $row['idVenda'];?>"><?php //echo "Codigo venda :".$row['max(idVenda)']." Cliente: ". $row['nomeCli']; ?></option>-->
     <?php }
     }}
   ?>





    <p class="text-center">


    <!--<select class="form-control" name="idVenda">-->
<?php
 ?>
     <!--</select>-->


     <br>
         <h3>Produtos</h3>
    <select class="form-control" name="idPro" id="idItemVenda"  onchange="atualizarValor()" required>
    <?php

         $valores = array();

         $sql = "select itemvenda.qtd as qtdItemvenda, produtos.* from produtos left join itemvenda on itemvenda.idpro = produtos.idpro and idVenda = $idVenda where produtos.qtd > 0 order by produtos.idPro  ";

         $resultado = mysqli_query($con, $sql);

         if(!$resultado){
          echo "Nenhum resultado encontrado";
          exit;
         }
    if(mysqli_num_rows($resultado)>0){
    while($row2 = mysqli_fetch_assoc($resultado)){
      $valores[$row2['idPro']] = $row2['valor'];
      $quantidade[$row2['idPro']] = $row2['qtdItemvenda'];


     ?>
        <option <?php echo ($row2['idPro'] == $idPro) ? 'selected' : ''; ?> value="<?php echo $row2['idPro'];?>" ><?php echo "Codigo Produto :".$row2['idPro']." Produto: ". $row2['nomePro']; ?></option>
     <?php }
     } ?>
     </select>
     <br>

    <h3>Quantidade</h3>

    <div class="row">
       <div class="form-group">
        <div class="col-md-12">
      	 <input type="number" value="" class="form-control" name="qtd" id="qtdPro" onchange="atualizarTotal()" required>
        </div>
       </div>
   </div>
   <br>

   <h3> Valor Unitário</h3>

       <div class="row">
       <div class="form-group">
        <div class="col-md-12">
      	 <input type="number" value="" class="form-control" name="preco" id="valorPro" readonly="readonly"required>
        </div>
       </div>
   </div>
   <br>

     <h3>Total</h3>

       <div class="row">
       <div class="form-group">
        <div class="col-md-12">
      	 <input type="number" value="" class="form-control" name="totalItem" id="total" onclick="atualizarValor()" readonly="readonly" required >
        </div>
       </div>
   </div>
   <br>

   <div class="form-group">
   <div class="row">
    <div class="col-md">
      <button class="btn btn-success btn-block" type="submit"  id="salvar">Incluir Item</button>
    </div>
    </div>
    <br>
    <div class="row">
    <div class="col-md">
      <a class="btn btn-primary btn-lg btn-block" id="botao2" href="detalhesVenda.php?idVenda=<?php echo $idVenda ?>" role="button">Detalhes</a>
    </div>
    </div>
    <br>

 </form>

 <br>
	</div>

</div>

<script>
	var valores = <?php echo json_encode($valores); ?>;
  var quantidade = <?php echo json_encode($quantidade); ?>;
  atualizarValor();

	function atualizarValor(){
		var idPro = document.getElementById("idItemVenda").value;
    document.getElementById("qtdPro").value = quantidade[idPro];
		document.getElementById("valorPro").value = valores[idPro];
   atualizarTotal();
	}

  function atualizarTotal(){
    var idPro = document.getElementById("idItemVenda").value;
    var qtd=document.getElementById("qtdPro").value;
    var valorItem = document.getElementById("valorPro").value;

    document.getElementById("total").value = qtd * valorItem;
  }
     var menu = document.getElementById("link-cadastrarVenda");
     menu.className = "active"
</script>
<style>
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
</body>
</html>
