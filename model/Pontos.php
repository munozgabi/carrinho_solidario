<?php
    require_once ("../infra/Database.php");

    class Pontos{

        private $idPonto;
        private $nome;
        private $cidade;
        private $bairro;
        private $rua;
        private $numero;
        private $cep;
        private $horario;

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
    
            $sql = "INSERT INTO pontos_coleta(nome, cidade, bairro, rua, numero, cep, horario) 
                    VALUES (:nome, :cidade, :bairro, :rua, :numero, :cep, :horario)";
            
            $st = $con->prepare($sql);
            $st->bindParam(':nome', $this->nome);
            $st->bindParam(':cidade', $this->cidade);
            $st->bindParam(':bairro', $this->bairro);
            $st->bindParam(':rua', $this->rua);
            $st->bindParam(':numero', $this->numero);
            $st->bindParam(':cep', $this->cep);
            $st->bindParam(':horario', $this->horario);

            $status = $st->execute();
    
            $idPonto= $con->lastInsertId();
    
            if ($status == true){
                return true;
            }
    
        }
    
        public function buscarPorId($idPonto)
        {
            $db = new Database();
            $con = $db->connect();
    
            $sql = "SELECT idPonto, nome, cidade, bairro, rua, numero, cep, horario FROM pontos_coleta WHERE idPonto = :idPonto";
            $st = $con->prepare($sql);
            $st->bindParam(':idPonto', $idPonto);
    
            $status = $st->execute();
            $dados = $st->fetchAll();
    
            $db->close();
            return $dados;
        }
        
        public function atualizar()
        {
            $db = new Database();
            $con = $db->connect();
    
            $sql = "UPDATE pontos_coleta SET nome = :nome, cidade = :cidade, bairro = :bairro, rua = :rua, numero = :numero, cep = :cep, horario = :horario  WHERE idPonto = :idPonto";
            $st = $con->prepare($sql);
            $st->bindParam(':nome', $nome);
            $st->bindParam(':cidade', $cidade);
            $st->bindParam(':bairro', $bairro);
            $st->bindParam(':rua', $rua);
            $st->bindParam(':numero', $numero);
            $st->bindParam(':cep', $cep);
            $st->bindParam(':horario', $horario);
            $st->bindParam(':idPonto', $idPonto);
    
            $status = $st->execute();

            $db->close();

            if ($status == true){
                return true;
            }
            else{
                return false;
            }
        }

        public function deletar($idPonto)
        {
            $db = new Database();
            $con = $db->connect();
    
            $sql = "DELETE FROM pontos_coleta WHERE idPonto = :idPonto";
            $st = $con->prepare($sql);
            $st->bindParam(':idPonto', $idPonto);
    
            $status = $st->execute();
    
            $db->close();
            return  true;
        }
    
        public function listarTodos($pagina = null, $contador = 100)
        {
            $db = new Database();
            $con = $db->connect();
    
            $sql = "SELECT idPonto, nome, cidade, bairro, rua, numero, cep, horario FROM pontos_coleta limit $contador";
            $rs = $con->query($sql);
    
            $status = $rs->execute();
            $dados = $rs->fetchAll();
    
            $db->close();
            return $dados;
        }
    }

?>