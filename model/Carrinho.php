<?php
    require_once ("../infra/Database.php");

    class Carrinho{

        private $idCarrinho;
        private $idUsuario;
        private $alimentos;
        private $horario;
        private $data;
        private $status;

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
    
            $sql = "INSERT INTO carrinho(idUsuario, alimentos, horario, data) 
                    VALUES (:idUsuario, :alimentos, :horario, :data)";
            
            $st = $con->prepare($sql);
            $st->bindParam(':idUsuario', $this->idUsuario);
            $st->bindParam(':alimentos', $this->alimentos);
            $st->bindParam(':horario', $this->horario);
            $st->bindParam(':data', $this->data);

            $status = $st->execute();
    
            $idPonto= $con->lastInsertId();
    
            if ($status == true){
                return true;
            }
    
        }
    
        public function buscarPorId($idCarrinho)
        {
            $db = new Database();
            $con = $db->connect();
    
            $sql = "SELECT idCarrinho, alimentos, data, horario FROM carrinho WHERE idCarrinho = :idCarrinho";
            $st = $con->prepare($sql);
            $st->bindParam(':idCarrinho', $idCarrinho);
    
            $status = $st->execute();
            $dados = $st->fetchAll();
    
            $db->close();
            return $dados;
        }
        public function dadosPedido($email)
        {
            $db = new Database();
            $con = $db->connect();
    
            $sql = "SELECT carrinho.idCarrinho, carrinho.alimentos, carrinho.horario, carrinho.data, carrinho.status, usuario.email, usuario.endereco, usuario.nome FROM carrinho INNER JOIN usuario ON carrinho.idUsuario = usuario.idUsuario WHERE email = :email";
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
    
            $sql = "UPDATE carrinho SET status = :status WHERE idCarrinho = :idCarrinho";
            $st = $con->prepare($sql);
            $st->bindParam(':status', $status);
            $st->bindParam(':idCarrinho', $idCarrinho);
    
            $status = $st->execute();
            
            $db->close();

            if ($status == true){
                return true;
            }
            else{
                return false;
            }
        }

        public function deletar($idCarrinho)
        {
            $db = new Database();
            $con = $db->connect();
    
            $sql = "DELETE FROM carrinho WHERE idCarrinho = :idCarrinho";
            $st = $con->prepare($sql);
            $st->bindParam(':idCarrinho', $idCarrinho);
    
            $status = $st->execute();
    
            $db->close();
            return  true;
        }
    
        public function listarTodos()
        {
            $db = new Database();
            $con = $db->connect();
    
            $sql = "SELECT carrinho.idCarrinho, usuario.idUsuario, carrinho.alimentos, carrinho.horario, carrinho.data, carrinho.status, usuario.email, usuario.endereco, usuario.nome FROM carrinho INNER JOIN usuario ON carrinho.idUsuario = usuario.idUsuario";
            $rs = $con->query($sql);
    
            $status = $rs->execute();
            $dados = $rs->fetchAll();
    
            $db->close();
            return $dados;
        }

        public function selectStatus()
        {
            $db = new Database();
            $con = $db->connect();
    
            $sql = "SELECT idStatus, descricao FROM status";
            $rs = $con->query($sql);
    
            $status = $rs->execute();
            $dados = $rs->fetchAll();
    
            $db->close();
            return $dados;
        }
    }

?>