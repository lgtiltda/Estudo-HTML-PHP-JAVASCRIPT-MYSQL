<?php
session_start();
date_default_timezone_set('America/Manaus');
// Incluir aquivo de conex�o
include("Banco.php");
require_once("../Util/functions.php");

$tipo = $_GET['tipo'];

$banco = new Banco();

switch ($tipo) {
    //VALIDAÇÃO DO LOGIN NA PAGINA INICIAL VIA JAVASCRIPT
    case 1:
        $login = $_GET['login']; echo '</br>';
        $senha = md5($_GET['senha']);
        $trueorfalse = 0;
        
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
        $param = array(
            ":usuario" => $login,
            ":senha" => $senha
        );

    $dt = $banco->ExecuteQuery($sql, $param);
   // var_dump($dt);
    if ($dt != null) {
        $trueorfalse = 1;
    } 


        
        if ($trueorfalse == 1) {
            echo "   <input style='width: 100%; padding: 20px; font-size: 16pt; height: 100px;' class='btn btn-lg btn-success btn-block' type='submit' name='btnEntrar' id='btnEntrar' value='Login'>";
            echo "<div style='width:100%; margin-left:0px; margin-top:5px;' class='alert alert-success'><b>Login</b> & <b>Senha</b> Válidos</br> Clique no Botão para iniciar Login</div>";
        }
        break;
   }
?>