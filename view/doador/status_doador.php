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
    <link rel="stylesheet" type="text/css" href="../../static/css/status_doador.css" media="screen"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans"/>
    <title>Carrinho Solidário</title>
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
        <div class="main-pontos">
            <div class="title-ponto">
                <h2>Status</h2>
            </div> 
            <?php
            for ($i=0; $i<sizeof($dados);$i++){
                  
                echo "<div class=\"pontos\">";
                echo "<p><strong>Id: </strong>".$dados[$i]["idCarrinho"] ."</p>";
                echo "<p><strong>Nome: </strong>".$dados[$i]["nome"] ."</p>";
                echo "<p><strong>Endereço: </strong>".$dados[$i]["endereco"] ."</p>";
                echo "<p><strong>Alimentos: </strong>".$dados[$i]["alimentos"] ."</p>";
                echo "<p><strong>Data: </strong>".$dados[$i]["data"] ."</p>";
                echo "<p><strong>Horário: </strong>".$dados[$i]["horario"] ."</p>";
                echo "<p><strong>Status: </strong>".$dados[$i]["status"] ."</p>";
                echo"</div>";
              }
              ?>
            
        </div>
    </div>
    
</body>
</html>