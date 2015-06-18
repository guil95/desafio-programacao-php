<?php require "seguranca.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./lib/style.css" rel="stylesheet">

</head>
<body>
<?php require "menu.php"; ?>


<?php


   $nomePro = '';

   if($_POST){
    $nomePro = $_POST['nomePro'];
    $qtdPro =  $_POST['qtdPro'];
    $valorPro = $_POST['valorPro'];
    $categoria = $_POST['categoria'];



    $sql="Insert Into produtos (nomePro, qtd, valor,categoria) values ('$nomePro','$qtdPro','$valorPro','$categoria')";

     require "conexao.php";

     $cadastrar = mysqli_query($con, $sql);

     if($cadastrar == false){
     	echo "Falha sql:" . mysqli_error($con);
     	echo $sql;
     	exit;
     }
     echo "Registro cadastrado";
     exit;
 }

 ?><div></div>
 <script>
alert('teste');
     var menu = document.getElementById("link-catPro");
     menu.className = "active";
</script>
</body>
</html>
