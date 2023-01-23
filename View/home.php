<?php
require_once ("Controller/ClientesController.php");
require_once ("Model/Clientes.php");

require_once ("Controller/UsuariosController.php");
require_once ("Model/Usuarios.php");
require_once("Util/UploadFile.php");
require_once("Util/functions.php");
$banco = new Banco();
$clientesController = new ClientesController();
$usuarioController = new UsuarioController();

if (isset($_GET['dia'])) {
    $dia_hoje = $_GET['dia'];
} else {
    $dia_hoje = date('d');
}
if (isset($_GET['mes'])) {
    $mes_hoje = $_GET['mes'];
} else {
    $mes_hoje = date('m');
}
if (isset($_GET['ano'])) {
    $ano_hoje = $_GET['ano'];
} else {
    $ano_hoje = date('Y');
}
//INICIALIZAÇÃO DE VARIAVÉIS
$resultado = "";
$cod = 0;
$nome = "";
$datanascimento = "";
$celular = "";
$erros = [];
$spResultadoBusca = "";
$listaClientesBusca = [];
$listaNotasAbertas = [];
$listaNotasFinalizadas = [];

//FUNÇÃO GET PARA LER MENSAGENS DE FINALIZAÇÃO DE REQUESIÇÕES
if (isset($_GET['msgget'])) {

    if ($_GET['msgget'] == 1) {
        $codcliente = $clientesController->RetornarUltimoClientes();
        $resultado = " <div style='width:100%;' class='alert alert-success' role='alert'><span>Cliente cadastrado com sucesso!</span></div>";
    }
    
}

if (filter_input(INPUT_POST, "btnSubmit", FILTER_SANITIZE_STRING)) {
    $nome = filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING);
    $nascimento = "";
    $cpf = "";
    $celular = filter_input(INPUT_POST, "txtCelular", FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, "txtEndereco", FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, "txtBairro", FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, "txtNumero", FILTER_SANITIZE_STRING);
    $complemento = filter_input(INPUT_POST, "txtComplemento", FILTER_SANITIZE_STRING);
    $erros = Validar();

    if (empty($erros)) {

        $clientes = new Clientes();

        $clientes->setNome($nome);
        $clientes->setNascimento($nascimento);
        $clientes->setCpf($cpf);
        $clientes->setCelular($celular);
        $clientes->setData(date('d/m/Y'));
        $clientes->setEndereco($endereco);
        $clientes->setBairro($bairro);
        $clientes->setNumero($numero);
        $clientes->setComplemento($complemento);
        $clientes->setDr(1); //ALTERAR E COLOCAR O FUNCIONARIO QUE ADICIONOU
        if ($clientesController->Cadastrar($clientes)) {
            $nome = "";
            $nascimento = "";
            $celular = "";
            header("Location: index.php?msgget=1");
            //$resultado = "<span class='spSucesso'>Cliente cadastrado com sucesso!</span>";
        } else {
            $resultado = "<span class='spErro'>Houve um erro ao tentar cadastrar o cliente!</span>";
        }
    }
}

function Validar() {
    $listaErros = [];
    $clientesController = new ClientesController();

    if (strlen(filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING)) < 5) {
        $listaErros[] = "- Nome inválido. (min 5 caracteres)";
    }

    
        if (strlen(filter_input(INPUT_POST, "txtCelular", FILTER_SANITIZE_STRING)) < 13) {
        $listaErros[] = "- Celular inválido.";
    }

    return $listaErros;
}
?>
<nav style='margin-top:-15px;' class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="" style="font-size: 16pt;">SISTEMA WEB </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" onfocus="" placeholder="Pequisar Clientes" aria-label="Pesquisar" style="height: 50px; font-size: 16pt;"  onkeyup='buscarClientes(1, 1, this.value)'>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" onClick='buscarClientes(2, 1, this.value)' href="javascript:func">Novo</a>
            </li>
        </ul>
</nav>
<DIV id='DIVPRINCIPALPARAMEDIA' style="margin-left:2%; margin-right:5%;">
    <div id='ListaPedidosTodos'>     
        <?=$resultado;?>   
    </div>
</DIV>
<script src="Interface/js/mask.js" type="text/javascript"></script>
<script>
                $('#txtDataNascimento').mask('00/00/0000'); //CEP
                $('#txtCelular').mask('(00)00000-0000'); //CELULAR
                $('#txtCpf').mask('000.000.000-00'); //CELULAR
</script>
<script>
    function ConfirmarIsso() {
        if (!confirm("Clique em Ok para Continuar."))
            return false;
    }
</script>