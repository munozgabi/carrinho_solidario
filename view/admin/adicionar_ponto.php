<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="../../static/img/logo_-_Copia-removebg-preview.png"/>
    <link rel="stylesheet" type="text/css" href="../../static/css/adicionar_ponto.css" media="screen"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans"/>
    <title>Adicionar Ponto</title>

    <script src="../../static/js/jquery-3.6.4.min.js"></script>
		<script type="text/javascript">
			$( document ).ready(function() {
			});

			function processa_cadastro(){
				var formDados = {
					nome: $("#nome").val(),
					cidade: $("#cidade").val(),
					bairro: $("#bairro").val(),
					rua: $("#rua").val(),
					numero: $("#numero").val(),
                    cep: $("#cep").val(),
                    horario: $("#horario").val(),
    			};

				$.ajax({
					type: "POST",
					url: "../../controller/pontos_controller.php?acao=cadastrar",
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
                    <p><a href="pontos_admin.php">Pontos de Coleta</a></p>
                </div>
                <img class="img-item" src="../../static/img/seta.png" alt="seta">
            </div>
            <div class="menu-item">
                <div class="menu-icon">
                    <img class="img-item" src="../../static/img/carrinho.jpg" alt="carrinho">
                    <p><a href="carrinho_admin.php">Carrinho Solidário</a></p>
                </div>
                <img class="img-item" src="../../static/img/seta.png" alt="seta">
            </div>
        </div>
        <div class="doacao">
            <div class="title">
                <a href="../../controller/pontos_controller.php?acao=listar"><img class="img-item" src="../../static/img/seta_voltar.png" alt="voltar"></a>
                <h2>Cadastrar Ponto de Coleta</h2>
            </div>
            <div class="form-container">
                <form action="../../controller/pontos_controller.php?acao=cadastrar" method="POST">
                    <div class="sessao">
                        <div class="title">
                            <h3>Nome</h3>
                        </div>
                        <div class="field">
                            <input type="text" name="nome" id="nome" placeholder="Insira o nome do ponto de coleta" required>
                          </div>
                    </div>
                    <div class="sessao">
                        <div class="title">
                            <h3>Cidade</h3>
                        </div>
                        <div class="field">
                            <input type="text" name="cidade" id="cidade" placeholder="Insira a cidade" required>
                        </div>
                    </div>
                    <div class="sessao">
                        <div class="title">
                            <h3>Bairro</h3>
                        </div>
                        <div class="field">
                            <input type="text" name="bairro" id="bairro" placeholder="Insira o bairro" required>
                        </div>
                    </div>
                    <div class="sessao">
                        <div class="title">
                            <h3>Rua</h3>
                        </div>
                        <div class="field">
                            <input type="text" name="rua" id="rua" placeholder="Insira a rua" required>
                        </div>
                    </div>
                    <div class="sessao">
                        <div class="title">
                            <h3>Número</h3>
                        </div>
                        <div class="field">
                            <input type="text" name="numero" id="numero" placeholder="Insira o número" required>
                        </div>
                    </div>
                    <div class="sessao">
                        <div class="title">
                            <h3>CEP</h3>
                        </div>
                        <div class="field">
                            <input type="text" name="cep" id="cep" placeholder="Insira o CEP" required>
                        </div>
                    </div>
                    <div class="sessao">
                        <div class="title">
                            <h3>Horário de Funcionamento</h3>
                        </div>
                        <div class="field">
                            <input type="text" name="horario" id="horario" placeholder="Insira o horário de funcionamento" required>
                        </div> 
                    </div>
                    <div class="field-btn">
                        <input type="submit" name="btn" value="Cadastrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>