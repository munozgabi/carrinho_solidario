<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="../static/img/logo_-_Copia-removebg-preview.png"/>
    <link rel="stylesheet" type="text/css" href="../../static/css/editar_status.css" media="screen"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans"/>
    <title>CEditar Status</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../static/img/logo.png" alt="logo do site">
        </div>
        <button><a href="pontos_coleta.html">Sair</a></button>
    </header>
    <div class="nav">
        <p><a href="../view/pontos_coleta.php">Pontos de coleta</a></p>
        <p><a href="../view/carrinho_solidario.php">Carrinho Solidário</a></p>
    </div>
    <div class="main">
        <div class="main-menu">
            <div class="menu-item">
                <div class="menu-icon">
                    <img class="img-item" src="../static/img/local.png" alt="ponto">
                    <p><a href="pontos_admin.php">Pontos de Coleta</a></p>
                </div>
                <img class="img-item" src="../static/img/seta.png" alt="seta">
            </div>
            <div class="menu-item">
                <div class="menu-icon">
                    <img class="img-item" src="../static/img/carrinho.jpg" alt="carrinho">
                    <p><a href="../view/admin/carrinho_admin.php">Carrinho Solidário</a></p>
                </div>
                <img class="img-item" src="../static/img/seta.png" alt="seta">
            </div>
        </div>
        <div class="doacao">
            <div class="title">
                <a href="../../controller/carrinho_controller.php?acao=listar"><img class="img-item" src="../static/img/seta_voltar.png" alt="voltar"></a>
                <h2>Editar Status</h2>
            </div>
            <div class="form-container">
            <form action="../controller/carrinho_controller.php?acao=atualizar" method="POST">
                    <input type="hidden" id="idCarrinho" name="idCarrinho" value="<?php echo $dados[0]["idCarrinho"]?>"/> <br>
                    <div class="sessao">
                        <div class="title">
                            <h3>Status</h3>
                        </div>
                        <div class="field">
                        <select name="status">
                            <option>Selecione...</option>
                            <?php foreach($dados_status as $option){ ?>
                            <option value="<?php echo $option['idStatus']?>"><?php echo $option['descricao']?></option>
                            <?php } ?>
                        </select>
                        </div>
                    </div>
                    <div class="button">
                        <div class="field-btn">
                            <input type="submit" name="btn" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    
</body>
</html>