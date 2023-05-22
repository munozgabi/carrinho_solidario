<?php
    function valida_sessao(){
        if(session_id() == '') {
            session_start();
            if (empty($_SESSION["logado"])){
                header("location:/view/login.php");
            }
        }
        else{
            echo "Não iniciado";
        }
    }

    valida_sessao();
?>