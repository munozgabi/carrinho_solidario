<?php
    require_once "../model/Pontos.php";

    class PontosController {
        
        public function execute($post, $get) {
            $acao = $get['acao'];
            if ($acao == "cadastrar"){
                $ponto = new Pontos();

                $nome = $post["nome"];
                $ponto->__set("nome", $nome);

                $cidade = $post["cidade"];
                $ponto->__set("cidade", $cidade);

                $bairro = $post["bairro"];
                $ponto->__set("bairro", $bairro);

                $rua = $post["rua"];
                $ponto->__set("rua", $rua);

                $numero = $post["numero"];
                $ponto->__set("numero", $numero);

                $cep = $post["cep"];
                $ponto->__set("cep", $cep);

                $horario = $post["horario"];
                $ponto->__set("horario", $horario);
                
                    if($ponto->salvar() == true){
                        $dados_pontos = $this->listarPontos();
                        header("Location: pontos_controller.php?acao=listar");
                    }
                    else{
                        $retorno = ["msg" =>"Erro ao cadastrar", "erro"=>"1"];
                        echo json_encode($retorno);
                    } 
            }
            else if($acao == "listar"){
               $dados_pontos = $this->listarPontos();

               require_once("../view/admin/pontos_admin.php");

            }
            else if($acao == "listarJson"){
                $data = $this->listarPontos();
                echo json_encode($data);
 
             }
            else if($acao == "editar"){
                $idPonto = $get["idPonto"];
                $ponto = new Pontos();
                $dados = $ponto->buscarPorId($idPonto);
                
                require_once("../view/admin/editar_ponto.php");
            }  
            
            else if($acao == "logout"){
                session_start();
                unset($_SESSION);
                session_destroy();
            
                header("location:../view/pontos_coleta.php");
            }
            else if($acao == "deletar"){
                $idPonto = $get["idPonto"];
                $ponto = new Pontos();
                $dados = $ponto->deletar($idPonto);
                
                $this->listarPontos();

                header("location:pontos_controller.php?acao=listar");
            }  
            else if ($acao == "atualizar"){
                $ponto = new Pontos();

                $idPonto = $post["idPonto"];
                $ponto->__set("idPonto", $idPonto);

                $nome = $post["nome"];
                $ponto->__set("nome", $nome);

                $cidade = $post["cidade"];
                $ponto->__set("cidade", $cidade);

                $bairro = $post["bairro"];
                $ponto->__set("bairro", $bairro);

                $rua = $post["rua"];
                $ponto->__set("rua", $rua);

                $numero = $post["numero"];
                $ponto->__set("numero", $numero);

                $cep = $post["cep"];
                $ponto->__set("cep", $cep);

                $horario = $post["horario"];
                $ponto->__set("horario", $horario);
                
                    if($ponto->atualizar() == true){
                        $retorno = ["msg" =>"Ponto atualizado com sucesso!", "erro"=>"0", "url"=> "pontos_controller.php?acao=listar"];
                        echo json_encode($retorno);
                        // header("location:pontos_controller.php?acao=listar");
                    }
                    else{
                        $retorno = ["msg" =>"Erro ao atualizar o usuário!", "erro"=>"1"];
                        echo json_encode($retorno);
                    }
                }
        
          
        }
    

        public function listarPontos(){
            $ponto = new Pontos();
            $dados = $ponto->listarTodos();

            return $dados;
        }
    }

    
  
  $controller = new PontosController();
  $controller->execute($_POST, $_GET); 
  
  