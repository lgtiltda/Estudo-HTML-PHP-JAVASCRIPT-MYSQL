<?php
session_start();
require_once ("Controller/ClientesController.php");
require_once ("Model/Clientes.php");

require_once("Controller/UsuariosController.php");
require_once("Model/Usuarios.php");


require_once("Util/UploadFile.php");

date_default_timezone_set('America/Manaus');
$usuarioController = new UsuarioController();

$retorno = "&nbsp;";
$erros = [];
//FUNÇÃO PARA VERIFICAR INFORMAÇÕES DO LOGIN E GERAR A SESSION
if (filter_input(INPUT_POST, "btnEntrar", FILTER_SANITIZE_STRING)) {

    $usuarioController = new UsuarioController();
    $user = filter_input(INPUT_POST, "txtUsuario", FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, "txtSenha", FILTER_SANITIZE_STRING);
    $permissao = 1;

    $resultado = $usuarioController->AutenticarUsuario($user, $pass, $permissao);

    if ($resultado != null) {
        if (filter_input(INPUT_POST, "ckManterLogado", FILTER_SANITIZE_STRING)) {
            $_SESSION["entrarAdminE"] = true;
        }

        
        $_SESSION["permissaoF"] = $resultado->getPermissao();
        $_SESSION["codF"] = $resultado->getCod();
        $_SESSION["nomeF"] = $resultado->getNome();
        $_SESSION["cod_orgaoF"] = $resultado->getCod_orgao();
        $_SESSION["funcaoF"] = $resultado->getFuncao();
        $_SESSION["logadoF"] = true;
        if ($resultado->getPermissao() == 1) {

            header("Location: index.php?");
        } else if ($resultado->getPermissao() == 2) {

            header("Location: index.php?pagina=homefunc");
        } else if ($resultado->getPermissao() == 3) {

            header("Location: index.php?pagina=hometelao");
        }
    } else {
        $retorno = "<div class=\"alert alert-danger\" role=\"alert\">Usuário ou senha inválido.</div>";
    }
}

$termo = "";
$tipo = 5;
$status = 1;
$listaUsuariosBusca2 = $usuarioController->RetornarUsuarios($termo, $tipo, $status);

//FUNÇÃO PARA VERIFICAR INFORMAÇÕES DO LOGIN, QUANTIDADES DE CARACTERES.
function ValidarUsu() {
    $listaErros = [];

    $usuarioController = new UsuarioController();


    if (strlen(filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING)) < 1) {
        $listaErros[] = "- Nome inválido.";
    }

    if (strlen(filter_input(INPUT_POST, "txtLogin", FILTER_SANITIZE_STRING)) < 1) {
        $listaErros[] = "- Usuario inválido.";
    }
    return $listaErros;
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="generator" content="">
<title>SISTEMA PARA APRENDIZAGEM DE HTML PHP JAVASCRIPT E MYSQL</title>

<link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">
<!-- Bootstrap core CSS -->
<link href="Interface/Blog/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

<!-- Custom styles for this template -->
<link href="Interface/Blog//css" rel="stylesheet"/>
<!-- Custom styles for this template -->
<link href="Interface/Blog/blog.css" rel="stylesheet"/>
<link rel="icon" href="Interface/img/logo.png">

<script src="Interface/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="Interface/js/funcs.js" type="text/javascript"></script>
<script src="Interface/js/funcshome.js" type="text/javascript"></script>
<link href="Interface/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="Interface/css/unsemantic-grid-responsive.css" rel="stylesheet" media="all" />
<link href="Interface/css/style.css" rel="stylesheet" type="text/css"/>

<!-- Bootstrap core CSS -->
<link href="./novainterface_files/bootstrap.min.css" rel="stylesheet" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">



<!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="manifest" href="https://getbootstrap.com/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


<!-- Custom styles for this template -->
<link href="./novainterface_files/dashboard.css" rel="stylesheet">
<style type="text/css">/* Chart.js */
    @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
</style>
</head>
<body>

<?PHP
    if (!isset($_SESSION["permissaoF"])) {
        ?>
        </br>
                        <form  method="post" name="frmCadastro" id="frmCadastro" class="form-signin" novalidate enctype="multipart/form-data">
                            <div style="margin-top: -10px; margin-left: 5%; text-align: center;">
                                <input  type="text" id="txtUsuario" style="margin-top:10px; width: 100%; padding: 20px; font-size: 16pt; height: 80px;" name="txtUsuario" class="form-control" placeholder="Digite seu Usuário" required="" autofocus=""/>
                                <input style="margin-top:10px; width: 100%; padding: 20px; font-size: 16pt; height: 80px;" type="password" id="txtSenha" name="txtSenha" class="form-control" placeholder="Digite sua Senha" required="" onkeyup="ValidacaoLogin(1, txtUsuario.value, this.value)"/>
                                </br>
                                <div id='validacaologin'>
                                </div>   
                            </div>
                        </form>                       
   <?php
} else {
    $cod_funcionario = (int) $_SESSION['codF'];
    $cod_funcionario = (int) $_SESSION['codF'];
    $permissao_funcionario = (int) $_SESSION['permissaoF'];
    ?>

        <?php
        require_once("Util/ResquestPagePrincipal.php");
        ?>  
        <?php
    }
    ?>

</body></html>