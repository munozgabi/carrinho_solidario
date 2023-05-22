<?php
    require_once ("../infra/Database.php");
    require_once ("Pontos.php");

    class Usuario{
        
    private $idUsuario;
    private $senha;
    private $nome;
    private $email;
    private $endereco;

    public function __set($atributo, $valor)
    {
        if (property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }

    public function __get($atributo)
    {
        if (property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }

    public function salvar(){
        $db = new Database();
        $con = $db->connect();

        $sql = "INSERT INTO usuario(nome, endereco, email, senha) 
                VALUES (:nome, :endereco, :email, :senha)";
        
        $st = $con->prepare($sql);
        $st->bindParam(':nome', $this->nome);
        $st->bindParam(':endereco', $this->endereco);
        $st->bindParam(':email', $this->email);
        $st->bindParam(':senha', $this->senha);
	    $status = $st->execute();

        $idUsuario = $con->lastInsertId();

        if ($status == true){
            return true;
        }

    }

    public function buscar($email)
    {
        $db = new Database();
        $con = $db->connect();

        $sql = "SELECT idUsuario, nome, email, endereco FROM usuario WHERE email = :email";
        $st = $con->prepare($sql);
        $st->bindParam(':email', $email);

        $status = $st->execute();
        $dados = $st->fetchAll();

        $db->close();
        return $dados;
    }

    public function buscarPorEmail($email)
    {
        $db = new Database();
        $con = $db->connect();

        $sql = "SELECT idUsuario FROM usuario WHERE email = :email";
        $st = $con->prepare($sql);
        $st->bindParam(':email', $email);

        $status = $st->execute();
        $dados = $st->fetchAll();

        $db->close();
        return $dados;
    }
    
    public function atualizar()
    {
        $db = new Database();
        $con = $db->connect();

        $sql = "UPDATE usuario SET nome = :nome, endereco = :endereco, email = :email WHERE idUsuario = :idUsuario";
        $st = $con->prepare($sql);
        $st->bindParam(':nome', $nome);
        $st->bindParam(':endereco', $endereco);
        $st->bindParam(':email', $email);
        $st->bindParam(':idUsuario', $idUsuario);

        $status = $st->execute();

        $db->close();

        if ($status == true){
            return true;
        }
    }

    public function listarTodos($pagina = null, $contador = 100)
    {
        $db = new Database();
        $con = $db->connect();

        $sql = "SELECT idUsuario, nome, endereco, email FROM usuario limit $contador";
        $rs = $con->query($sql);

        $status = $rs->execute();
        $dados = $rs->fetchAll();

        $db->close();
        return $dados;
    }


    public function autenticar($email, $senha)
    {
        $senha_cripto = hash("sha3-256", $senha);
        $database = new Database();
        $con = $database->connect();

        $sql = "SELECT idUsuario, email FROM usuario WHERE email = :email AND senha = :senha";

        $st = $con->prepare($sql);
        $st->bindParam(':email', $email);
        $st->bindParam(':senha', $senha_cripto);
        $retorno = $st->execute();
        $dados = $st->fetchAll();

        if (sizeof($dados) == 1){
            return true;
        }
        else{
            return false;
        }
    }


    public function autenticarAdmin($email, $senha)
    {
        $senha_cripto = hash("sha3-256", $senha);
        $database = new Database();
        $con = $database->connect();

        $sql = "SELECT idUsuario, email, tipo FROM usuario WHERE email = :email AND senha = :senha AND tipo = :tipo";

        $tipo = 1;
        $st = $con->prepare($sql);
        $st->bindParam(':email', $email);
        $st->bindParam(':senha', $senha_cripto);
        $st->bindParam(':tipo', $tipo);
        $retorno = $st->execute();
        $dados_login = $st->fetchAll();

        if (sizeof($dados_login) == 1){
          
            return $dados_login;
        }
        else{
            return null;
        }
    }

    }

?>