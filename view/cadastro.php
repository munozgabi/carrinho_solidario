<?php
	// require_once("../infra/valida_sessao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="../static/img/logo_-_Copia-removebg-preview.png"/>
    <link rel="stylesheet" type="text/css" href="../static/css/cadastro.css" media="screen"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans"/>
    <title>Cadastro</title>

    <script src="../static/js/jquery-3.6.4.min.js"></script>
		<script type="text/javascript">
			$( document ).ready(function() {
			});

			function processa_cadastro(){
				var formDados = {
					nome: $("#nome").val(),
					endereco: $("#endereco").val(),
					email: $("#email").val(),
					senha: $("#senha").val(),
					confirmar_senha: $("#confirmar_senha").val()
    			};

				$.ajax({
					type: "POST",
					url: "../controller/usuario_controller.php?acao=cadastrar",
					data: formDados,
					dataType: "json",
					}).done(function (dataRetorno) {
						if(dataRetorno.erro == 0){
							alert(dataRetorno.msg)
							window.location.href = dataRetorno.url;
						}
						else{
							alert(dataRetorno.msg)
						}
						
				});
				
			}
		</script>
</head>

<body>
  <header>
      <div class="logo">
          <img src="../static/img/logo.png" alt="logo do site">
      </div>
  </header>
  <div class="nav">
      <p><a href="pontos_coleta.php">Pontos de coleta</a></p>
      <p><a href="carrinho_solidario.php">Carrinho Solidário</a></p>
  </div>
<div class="main"> 
  <div class="main-signup">
      <div class="title-login">Cadastro</div>
      <div class="form-container">
        <div class="form-signup">
          <form class="login" method="POST" action="#">
            <div class="field">
              <input type="text" id="nome" name="nome" placeholder="Nome" required>
            </div>
            <div class="field">
              <input type="text" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="field">
              <input type="text" id="endereco" name="endereco" placeholder="Endereço" required>
            </div>
            <div class="field">
              <input type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>
            <div class="field">
              <input type="password" id="confirmar_senha" name="confirmar_senha" placeholder="Confirmar Senha" required>
            </div>
            <div class="field-btn">
              <input type="button" value="Cadastrar" onclick="processa_cadastro()">
            </div>
            <div class="signup-link">Já possui uma conta? <a href="login.php"> Faça o login aqui</a></div>
          </form>
        </div>
      </div>
    </div>
</div>
</body>
</html>