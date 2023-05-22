<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagem/png" href="../static/img/logo_-_Copia-removebg-preview.png"/>
    <link rel="stylesheet" type="text/css" href="../static/css/pontos_coleta.css" media="screen"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans"/>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="../static/js/jquery-3.6.4.min.js"></script>
    <script src="../static/js/pontos_coleta.js"></script>
    <title>Pontos de Coleta</title>
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
        <div class="buscar-main">
                <div class="title">
                    <h2>Pontos de Coleta</h2>
                </div>
                <div class="buscar-ponto">
                    <p>Busque por um ponto de coleta próximo de você e doe alimentos</p>
                    <div class="form-container">
                        <form>
                            <div class="field">
                                <input type="text" name="busca-endereco" id="address" placeholder="Insira o endereço ou CEP">
                            </div>
                            <div class="field-btn">
                                <button type="button" name="btn" id="search">Buscar</button>
                                <button type="button" id="meuLocal">Minha Localização</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <div class="mapa" id="map">
            
        </div>
    </div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCij4r1XKpsDDdTul6sa34CkOMsae8b7JM&callback=initMap&v=weekly"
      defer
    ></script>
</body>
</html>
