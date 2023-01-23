<?php
//Error_reporting(0);
session_start();

include("Banco.php");
$banco = new Banco();
$tipo = $_GET['tipo'];
$cod_func = $_SESSION['codF'];

switch ($tipo) {
    //PESQUISAR CLIENTES NA TELA INICIAL
    case 1:
        $param = $_GET['param'];
        $valor = $_GET['valor'];
        ECHO "
             <h2>Meus Clientes</h2>
      <div class='table-responsive'>
        <table class='table table-striped table-sm'>
          <thead>
            <tr>
              <th>Nome</th>
              <th>Endereço e Contato</th>
            <th>#</th>
            </tr>
          </thead>
          <tbody>
          "; 
            
      
        //$sql = mysqli_query($conn, "SELECT * FROM clientes WHERE nome LIKE '%" . $valor . "%' ORDER BY id DESC");
        // Exibe todos os valores encontrados
        $sqlClientes = "SELECT * FROM clientes WHERE nome LIKE :nome ORDER BY id DESC";
        $paramClientes = array(
            ":nome" => "%{$valor}%"
        );

        $dataTableClientes = $banco->ExecuteQuery($sqlClientes, $paramClientes);
        foreach ($dataTableClientes as $resultadoclientes) {

            $codcliente = $resultadoclientes['id'];
            $nomecliente = $resultadoclientes['nome'];
            $datanascimento = $resultadoclientes['nascimento'];
            $cpf = $resultadoclientes['cpf'];
            $celular = $resultadoclientes['celular'];
            $endereco = $resultadoclientes['endereco'];    
            $bairro = $resultadoclientes['bairro'];    
            $numero = $resultadoclientes['numero'];    
            $complemento = $resultadoclientes['complemento'];    
            
         
            

                echo " 
            <tr>
              <td>
               <b>Cod.:</b> $codcliente</br>
                <b>Nome.: </b>$nomecliente 
            </td>
              <td>
                <b>Endereço.: </b>$endereco</br>
                                        <b>Bairro.: </b>$bairro</br>
                                        <b>Número.: </b>$numero</br>
                                        <b>Complemento.:</b> $complemento</br>
              <b>Celular.: </b>$celular</br>
                                                                    
              </td>
              <tD></TD>
            </tr>
            

            ";
                }
                echo "
          </tbody>
        </table>
      </div>
            
            ";
       
        $textobonus = "";
        break;
    //CHAMAR FORMULÁRIO PARA CADASTRAR NOVO CLIENTE 
    case 2:

        $param = $_GET['param'];
        $valor = $_GET['valor'];
ECHO "  
        <div class='row'>

            <div class='col-12 col-md-12' style='text-align: right;'>
                <ol class='breadcrumb'>
                    <li class='active'>Cadastro Novo Cliente</li>
                </ol>
            </div>
            <form style='width: 100%;' onsubmit='return ConfirmarIsso();' method='post' name='frmCadastroNovoCli' id='frmCadastroNovoCli' novalidate enctype='multipart/form-data'>
                <div class='col-12 col-md-8' style='text-align: left;'>
                    <div class='form-group label-floating'>
                        <label style='padding:5px; color:337AB7; border-bottom: 2px solid #337AB7; width: 100%; ' style='padding:5px; color:337AB7; border-bottom: 2px solid #337AB7; width: 100%; ' for='txtNome' class='control-label'>Nome Completo</label>
                        <input style='padding:30px; font-size: 15pt; width: 100%; ' type='text' class='form-control' id='txtNome' name='txtNome' value='' >
                    </div>
                </div>  
               <div class='col-12 col-md-4' style='text-align: left;'>
                    <div class='form-group label-floating'>  
                        <label style='padding:5px; color:337AB7; border-bottom: 2px solid #337AB7; width: 100%; ' class='control-label'>Celular<span id='spValidaCelular'>&nbsp;</span></label>
                        <input style='padding:30px; font-size: 15pt; width: 100%; ' type='text' id='txtCelular' name='txtCelular' class='form-control' value='' >
                    </div>
                </div>
                <div class='col-12 col-md-12' style='text-align: left;'>
                    <div class='form-group label-floating'>
                        <label style='padding:5px; color:337AB7; border-bottom: 2px solid #337AB7; width: 100%; ' style='padding:5px; color:337AB7; border-bottom: 2px solid #337AB7; width: 100%; ' for='txtNome' class='control-label'>Endereço</label>
                        <input style='padding:30px; font-size: 15pt; width: 100%; ' type='text' class='form-control' id='txtEndereco' name='txtEndereco' value='' >
                    </div>
                </div>  
                <div class='col-12 col-md-6' style='text-align: left;'>
                    <div class='form-group label-floating'>
                        <label style='padding:5px; color:337AB7; border-bottom: 2px solid #337AB7; width: 100%; ' style='padding:5px; color:337AB7; border-bottom: 2px solid #337AB7; width: 100%; ' for='txtNome' class='control-label'>Bairro</label>
                        <input style='padding:30px; font-size: 15pt; width: 100%; ' type='text' class='form-control' id='txtBairro' name='txtBairro' value='' >
                    </div>
                </div>  
                <div class='col-12 col-md-6' style='text-align: left;'>
                    <div class='form-group label-floating'>
                        <label style='padding:5px; color:337AB7; border-bottom: 2px solid #337AB7; width: 100%; ' style='padding:5px; color:337AB7; border-bottom: 2px solid #337AB7; width: 100%; ' for='txtNome' class='control-label'>Nº</label>
                        <input style='padding:30px; font-size: 15pt; width: 100%; ' type='text' class='form-control' id='txtNumero' name='txtNumero' value='' >
                    </div>
                </div>  

                <div class='col-12 col-md-12' style='text-align: left;'>
                    <div class='form-group label-floating'>
                        <label style='padding:5px; color:337AB7; border-bottom: 2px solid #337AB7; width: 100%; ' style='padding:5px; color:337AB7; border-bottom: 2px solid #337AB7; width: 100%; ' for='txtNome' class='control-label'>Complemento</label>
                        <input style='padding:30px; font-size: 15pt; width: 100%; ' type='text' class='form-control' id='txtComplemento' name='txtComplemento' value='' >
                    </div>
                </div>  

                <input style='margin-left: 5%; padding:20px; font-size: 15pt; width: 90%;' type='submit' name='btnSubmit' id='btnSubmit' value='Cadastrar'  class='btn btn-success btn-lg btn-block' />
                

            </form>
        </div>
";        break;
    }


mb_internal_encoding("UTF-8");
mb_http_output("iso-8859-1");
ob_start("mb_output_handler");
?>