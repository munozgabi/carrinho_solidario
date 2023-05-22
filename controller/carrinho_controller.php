<?php
    require_once "../model/Carrinho.php";

    class CarrinhoController {
        
        public function execute($post, $get) {
            $acao = $get['acao'];
            if ($acao == "cadastrar"){
                $carrinho = new Carrinho();

                $idUsuario = $post["idUsuario"];
                $carrinho->__set("idUsuario", $idUsuario);

                $alimentos = $post["alimentos"];
                $carrinho->__set("alimentos", $alimentos);

                $data = $post["data"];
                $carrinho->__set("data", $data);

                $horario = $post["horario"];
                $carrinho->__set("horario", $horario);
                
                if($carrinho->salvar() == true){
                    $retorno = ["msg" =>"Seu agendamento foi concluído!", "erro"=>"0"];
                    echo json_encode($retorno);
                    header("location:../view/doador/status_doador.php");
                }
                else{
                    $retorno = ["msg" =>"Erro ao cadastrar", "erro"=>"1"];
                    header("location:../view/doador/doacao.php?erro=1");
                }
            } 
            else if($acao == "listar"){
               $dados_carrinho = $this->listarCarrinho();

               require_once("../view/admin/carrinho_admin.php");

            }
            else if($acao == "listarPedido"){
                $email = $get["email"];
                $carrinho = new Carrinho();
                $dados = $carrinho->dadosPedido($email);
    
                require_once("../view/doador/status_doador.php");
            } 
            else if($acao == "listarJson"){
                $data = $this->listarPontos();
                echo json_encode($data);
 
             }
            else if($acao == "editar"){
                $idCarrinho = $get["idCarrinho"];
                $carrinho = new Carrinho();
                $dados = $carrinho->buscarPorId($idCarrinho);
                $dados_status = $carrinho->selectStatus();
                
                require_once("../view/admin/editar_status.php");
            } 
            else if($acao == "logout"){
                session_start();
                unset($_SESSION);
                session_destroy();
            
                header("location:../view/pontos_coleta.php");
            }
            else if($acao == "deletar"){
                $idCarrinho = $get["idCarrinho"];
                $carrinho = new Carrinho();
                $dados = $carrinho->deletar($idCarrinho);
                
                $this->listarCarrinho();

                header("location:carrinho_controller.php?acao=listar");
            }  
            else if ($acao == "atualizar"){
                $carrinho = new Carrinho();

                $idCarrinho = $post["idCarrinho"];
                $carrinho->__set("idCarrinho", $idCarrinho);

                $status = $post["status"];
                $carrinho->__set("status", $status);
                
                    if($carrinho->atualizar() == true){
                        header("location:../../controller/carrinho_controller.php?acao=listar");
                    }
                    else{
                        $retorno = ["msg" =>"Erro ao atualizar o usuário!!", "erro"=>"1"];
                        echo json_encode($retorno);
                    }
            }
        }

        public function listarCarrinho(){
            $carrinho = new Carrinho();
            $dados = $carrinho->listarTodos();

            return $dados;
        }
    }

    
  
  $controller = new CarrinhoController();
  $controller->execute($_POST, $_GET); 
  
  