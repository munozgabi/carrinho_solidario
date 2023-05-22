 <?php
	require_once("../infra/valida_sessao.php");
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="../../static/img/logo_-_Copia-removebg-preview.png"/>
    <link rel="stylesheet" type="text/css" href="../../static/css/doacao.css" media="screen"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans"/>
    <title>Carrinho Solidário</title>

    <script src="../../static/js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript">
		$( document ).ready(function() {
         erro = "<?php echo $_GET["erro"]; ?>";
         if(erro == 1){
            alert("Erro ao cadastrar!");
         }
	    });
		</script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../../static/img/logo.png" alt="logo do site">
        </div>
        <button><a href="../controller/usuario_controller.php?acao=logout">Sair</a></button>
    </header>
    <div class="nav">
        <p><a href="../view/pontos_coleta.php">Pontos de coleta</a></p>
        <p><a href="../view/carrinho_solidario.php">Carrinho Solidário</a></p>
    </div>
    <div class="main">
    <div class="main-menu">
            <div class="menu-item">
                <div class="menu-icon">
                    <img class="img-item" src="../../static/img/home.png" alt="casa">
                    <p><a href="../view/doador/home_doador.php">ínicio</a></p>
                </div>
                <img class="img-item" src="../../static/img/seta.png" alt="seta">
            </div>
            <div class="menu-item">
                <div class="menu-icon">
                    <img class="img-item" src="../../static/img/doacao.png" alt="doação">
                    <p><a href="\../controller/usuario_controller.php?acao=pegarIdUsuario&email=<?php echo $_SESSION["emailDoador"];?> ">Doação</a></p>
                </div>
                <img class="img-item" src="../../static/img/seta.png" alt="seta">
            </div>
            <div class="menu-item">
                <div class="menu-icon">
                    <img id="perfil" src="../../static/img/status.png" alt="status">
                    <p><a href="\../controller/carrinho_controller.php?acao=listarPedido&email=<?php echo $_SESSION["emailDoador"];?>">Status</a></p>
                </div>
                <img class="img-item" src="../../static/img/seta.png" alt="seta">
            </div>
            <div class="menu-item">
                <div class="menu-icon">
                    <img id="perfil" src="../../static/img/perfil.png" alt="perfil">
                    <p><a href="\../controller/usuario_controller.php?acao=editar&email=<?php echo $_SESSION["emailDoador"];?>">Perfil</a></p>
                </div>
                <img class="img-item" src="../../static/img/seta.png" alt="seta">
            </div>
        </div>
        <div class="doacao">
            <div class="form-container">
                <form action="../../controller/carrinho_controller.php?acao=cadastrar" method="POST">
                    <div class="title">
                        <h2>Carrinho Solidário</h2>
                    </div>
                    <div class="sessao">
                        <div class="field">
                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $dados[0]["idUsuario"]?>"/> <br>
                        </div>
                    </div>
                    <div class="sessao">
                        <div class="title">
                            <h3>Alimentos</h3>
                        </div>
                        <div class="field">
                            <input type="text" id="alimentos" name="alimentos" placeholder="Insira os alimentos que deseja doar" required>
                          </div>
                    </div>
                    <div class="sessao">
                        <div class="title">
                            <h3>Data</h3>
                        </div>
                        <div class="field">
                            <input type="date" id="data" name="data" required>
                        </div>
                    </div>
                    <div class="sessao">
                        <div class="title">
                            <h3>Horário</h3>
                        </div>
                        <div class="field">
                            <input type="time" id="horario" name="horario" required>
                        </div>
                    </div>

                    <div class="field-btn">
                        <input type="submit" name="btn" value="Finalizar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>