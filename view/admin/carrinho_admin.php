<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="../../static/img/logo_-_Copia-removebg-preview.png"/>
    <link rel="stylesheet" type="text/css" href="../../static/css/carrinho_admin.css" media="screen"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans"/>
    <title>Carrinho Solidário</title>

    <script type="text/javascript">
			function excluir(idCarrinho){
				retorno = confirm("Tem certeza que deseja excluir o ID="+idCarrinho+" ?")
				if(retorno){
					alert("Excluindoo!!");
					document.location.href = "../controller/carrinho_controller.php?acao=deletar&idCarrinho="+idCarrinho;
				}
			}
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
                    <img class="img-item" src="../../static/img/local.png" alt="ponto">
                    <p><a href="../../controller/pontos_controller.php?acao=listar">Pontos de Coleta</a></p>
                </div>
                <img class="img-item" src="../../static/img/seta.png" alt="seta">
            </div>
            <div class="menu-item">
                <div class="menu-icon">
                    <img class="img-item" src="../../static/img/carrinho.jpg" alt="carrinho">
                    <p><a href="../../controller/carrinho_controller.php?acao=listar">Carrinho Solidário</a></p>
                </div>
                <img class="img-item" src="../../static/img/seta.png" alt="seta">
            </div>
        </div>
        <div class="main-pontos">
            <div class="title-ponto">
                <h2>Carrinho Solidário</h2>
            </div>
            <div class="main-pontos">
            <table>
            <tr id="cabecalho">
                <td>Editar</td>
                <td>Nome</td>
                <td>Endereço</td>
                <td>Alimentos</td>
                <td>Data</td>
                <td>Horário</td>
                <td>Status</td>
                <td>Excluir</td>
            </tr>
            <?php
                for ($i=0; $i<sizeof($dados_carrinho);$i++){
                  
                    echo "<tr>";	
                    echo "<td align='center'><a href=\"../controller/carrinho_controller.php?acao=editar&idCarrinho=".$dados_carrinho[$i]["idCarrinho"]."\">".$dados_carrinho[$i]["idCarrinho"]."</a></td>";
                    echo "<td align='center'>".$dados_carrinho[$i]["nome"]."</td>";
                    echo "<td align='center'>".$dados_carrinho[$i]["endereco"]."</td>";
                    echo "<td align='center'>".$dados_carrinho[$i]["alimentos"]."</td>";
                    echo "<td align='center'>".$dados_carrinho[$i]["data"]."</td>";
                    echo "<td align='center'>".$dados_carrinho[$i]["horario"]."</td>";
                    echo "<td align='center'>".$dados_carrinho[$i]["status"]."</td>";
                    echo "<td align='center'><a href='#' onclick='excluir(".$dados_carrinho[$i]["idCarrinho"].")'>x</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        </div>
    </div>
    
</body>
</html>