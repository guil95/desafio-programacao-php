<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./lib/style.css" rel="stylesheet">
    <title>Desafio</title>

    <style type="text/css">


          .container {
            max-width: 330px;
          }

          form { margin-bottom: 15px; }
    </style>
  </head>
  <body>
<?php
require "seguranca.php";
require "conexao.php";

$idUsuario = "";
if(isset($_GET)){
  $idUsuario = $_GET['idUsuario'];
  $sql = "Select * From usuario where idUsuario = " . $idUsuario;

   $resultado = mysqli_query($con, $sql);

   if(!$resultado){
      echo"Nenhum cadastro encontrado".mysqli_error();
      echo $sql;
      exit;
   } else {
      $row = mysqli_fetch_assoc($resultado);
   }
}else{
  echo"Nenhum dado encontrado";
  echo $sql;
}
      //require "listarCli.php";
      ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./lib/style.css" rel="stylesheet">
    <title>Desafio</title>

    <style type="text/css">


          .container {
            max-width: 330px;
          }

          form { margin-bottom: 15px; }
    </style>
  </head>
  <body>
    <?php require "menu.php"; ?>


  	<div class="container-fluid">

  	<div class="row">
  	  <div class="col-xs-12">
  	      <h2 class="form-signin-heading">Cadastro de Usuário</h2>
  	  </div>
    </div>


          <form class="form-signin" role="form" method="post" action="editar-usuarios.php">

              <div class="form-group">
              <label for="femail">Id Usuario </label>
              <input type="text" class="form-control" id="femail" name="nome" placeholder="Nome" value="<?php echo $row['idUsuario']; ?>" readonly="readonly" require>
            </div>
            <br>
            <div class="form-group">
              <label for="femail">Nome </label>
              <input type="text" class="form-control" id="femail" name="nome" placeholder="Nome" value="<?php echo $row['nome']; ?>"  require>
            </div>
            <br>
            <div class="form-group">
              <label for="femail">Email: </label>
              <input type="email" class="form-control" id="femail" name="email" placeholder="Endereço de e-mail" value="<?php echo $row['email']; ?>" require>
            </div>

            <div class="form-group">
              <label for="fsenha">Senha: </label>
              <input type="password" class="form-control" id="fsenha" name="senha" "value=<?php echo $row['senha']; ?>"  require>
            </div>
            <br>
            <div class="form-group">
              <label for="Csenha">Confirmar Senha: </label>
              <input type="password" class="form-control" id="Csenha" name="Csenha"  require>
            </div>
             <button type = "button" class="btn btn-primary btn-block"
                     onClick="testeSenha()">Confirmar Senha</button>
<br><br>
             <button type="submit" class="btn btn-primary btn-block"
                     id="salvar" style = "display:none">Salvar</button>
<br>


          </form>

          </div>
               <script>
                   function testeSenha(){

            	   var senha = document.getElementById("fsenha").value;
                   var Csenha = document.getElementById("Csenha").value;

                    if (senha != Csenha) {
                 	 alert("Senha incorreta");
                 	 document.getElementById("fsenha").focus();
                 	 return;
                    }  else if(senha == ''){
                    	alert("Digite senha");
                    	document.getElementById("fsenha").focus();
                    	return;
                    }  else{
                 	    document.getElementById("salvar").style.display="block";
                       }
                   }

              </script>
  </body>
</html>
