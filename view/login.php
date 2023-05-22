<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="../static/img/logo_-_Copia-removebg-preview.png"/>
    <link rel="stylesheet" type="text/css" href="../static/css/login.css" media="screen"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans"/>
    <title>Login</title>

    <script src="/static/js/jquery-3.6.4.min.js"></script>
    <script src="/static/js/login.js" defer></script>
		<script type="text/javascript">
			$( document ).ready(function() {
         erro = "<?php echo $_GET["erro"]; ?>";
         if(erro == 1){
            alert("Usuario/senha inválidos!!");
         }
			});
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
    <div class="main-login">
      <div class="title-login">Login</div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Doador</label>
          <label for="signup" class="slide signup">Admin</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-login">
          <form class="login" action="../controller/usuario_controller.php?acao=logar" method="POST">
            <div class="field">
              <input type="text" id="emailDoador" name="emailDoador" placeholder="Email" required>
            </div>
            <div class="field">
              <input type="password" id="senhaDoador" name="senhaDoador" placeholder="Senha" required>
            </div>
            <div class="field-btn">
            <input type="submit" value="Entrar">
            </div>
            <div class="signup-link">Não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a></div>
          </form>

          <form class="login" action="../controller/usuario_controller.php?acao=logar_admin" method="POST">
            <div class="field">
              <input type="text" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="field">
              <input type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>
            <div class="field-btn">
              <input type="submit" value="Entrar" >
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
</body>
</html>