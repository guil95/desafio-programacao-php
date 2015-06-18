<?php
require "seguranca.php";
require "conexao.php";

  $senha = "";
  $email = "";
  $nome = "";

  if($_POST){
  	$email = $_POST['email'];
  	$senha = $_POST['senha'];
    $nome = $_POST['nome'];

    $sql = "Insert into usuario (nome, senha, email) values ('$nome', '$senha', '$email')";
    $resultado = mysqli_query($con,$sql);
    if(!$resultado){
    	echo "Cadastro ja existe";
    	exit;
    }
  }

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


          <form class="form-signin" role="form" method="post" action="cadastro-usuario.php">

            <div class="form-group">
              <label for="femail">Nome </label>
              <input type="text" class="form-control" id="femail" name="nome" placeholder="Nome" require>
            </div>
            <div class="form-group">
              <label for="femail">Email: </label>
              <input type="email" class="form-control" id="femail" name="email" placeholder="Endereço de e-mail" require>
            </div>

            <div class="form-group">
              <label for="fsenha">Senha: </label>
              <input type="password" class="form-control" id="fsenha" name="senha"  require>
            </div>
            <br>
            <div class="form-group">
              <label for="Csenha">Confirmar Senha: </label>
              <input type="password" class="form-control" id="Csenha" name="Csenha"  require>
            </div><br>
             <button type = "button" class="btn btn-success btn-block"
                     onClick="testeSenha()">Confirmar Senha</button>
<br><br>
             <button type="submit" class="btn btn-success btn-block"
                     id="salvar" style = "display:none">Salvar</button>
<br>
               <a class="btn btn-primary btn-lg btn-block" href="listar-usuarios.php" role="button">Listar</a>



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
