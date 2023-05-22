<?php
    require_once "../model/Usuario.php";

    class UsuarioController {
        
        public function execute($post, $get) {
            $acao = $get['acao'];
            if ($acao == "cadastrar"){
                $usuario = new Usuario();

                $nome = $post["nome"];
                $usuario->__set("nome", $nome);

                $endereco = $post["endereco"];
                $usuario->__set("endereco", $endereco);

                $email = $post["email"];
                $usuario->__set("email", $email);

                $senha = $post["senha"];
                $confirmar_senha = $post["confirmar_senha"];
                
                if ($senha == $confirmar_senha){
                    $senha_hash = hash("sha3-256", $senha);
                    $usuario->__set("senha", $senha_hash);
                   
                    if($usuario->salvar() == true){
                        $retorno = ["msg" =>"Cadastro realizado sucesso!", "erro"=>"0", "url" => "../view/doador/home_doador.php"];
                        echo json_encode($retorno);
                    }
                    else{
                        $retorno = ["msg" =>"Erro ao cadastrar", "erro"=>"1"];
                        echo json_encode($retorno);
                    }
                }
            }
            else if($acao == "listar"){
               $this->listarUsuarios();
            }
            else if($acao == "editar"){
                $email = $get["email"];
                $usuario = new Usuario();
                $dados = $usuario->buscar($email);
                
                require_once("../view/doador/editar_perfil.php");
            } 
            else if($acao == "pegarIdUsuario"){
                $email = $get["email"];
                $usuario = new Usuario();
                $dados = $usuario->buscarPorEmail($email);
                
                require_once("../view/doador/doacao.php");
            }   
            else if($acao == "logar"){
                $email = $post["emailDoador"];
                $senha = $post["senhaDoador"];

                $usuario = new Usuario();
                $valida = $usuario->autenticar($email, $senha);

                if ($valida == true){
                    session_start();
	                $_SESSION["logado"] = true;
                    $_SESSION["emailDoador"] = $email;

                    header("location:../view/doador/home_doador.php");
                }
                else{
                    $retorno = ["msg" =>"Senha Invalida!", "erro"=>"1"];
                    header("location:../view/login.php?erro=1");
                }
            }   

            else if($acao == "logar_admin"){
                $email = $post["email"];
                $senha = $post["senha"];
            
                $usuario = new Usuario();
                $dados_login = $usuario->autenticarAdmin($email, $senha);

                if ($dados_login != null){
                    session_start();
	                $_SESSION["logado"] = true;

                    $pontos = new Pontos();
                    $dados_pontos = $pontos->listarTodos();

                    require_once("../view/admin/pontos_admin.php");

                }
                else{
                    $retorno = ["msg" =>"Senha Invalida!", "erro"=>"1"];
                    header("location:../view/login.php?erro=1");
                }
            }   

            else if($acao == "logout"){
                session_start();
                unset($_SESSION);
                session_destroy();
            
                header("location:../view/pontos_coleta.php");
            }
            else if($acao == "deletar"){
                $id = $get["id"];
                $usuario = new Usuario();
                $dados = $usuario->deletar($id);
                
                $this->listarUsuarios();
            }  
        
            else if ($acao == "atualizar") {
                $usuario = new Usuario();

                $idUsuario = $post["idUsuario"];
                $usuario->__set("idUsuario", $idUsuario);

                $nome = $post["nome"];
                $usuario->__set("nome", $nome);

                $endereco = $post["endereco"];
                $usuario->__set("endereco", $endereco);

                $email = $post["email"];
                $usuario->__set("email", $email);
                   
                    if($usuario->atualizar() == true){
                        $retorno["msg"] = "Usuário atualizado com sucesso!";
                        $retorno["erro"] = "0";
                        $retorno["url"] = "../view/doador/home_doador.php";
                        
                        echo json_encode($retorno);
                    }
                    else{
                        $retorno = ["msg" =>"Erro ao atualizar!", "erro"=>"1"];
                        echo json_encode($retorno);
                    }
            
            }
        }
    

        public function listarUsuarios(){
            $usuario = new Usuario();
            $dados = $usuario->listarTodos();

            // require_once("../view/doador/doacao.php");
        }
    }

    
  
  $controller = new UsuarioController();
  $controller->execute($_POST, $_GET); 
  
  