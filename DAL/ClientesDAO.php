<?php

require_once("Banco.php");

class ClientesDAO {

    private $pdo;
    private $debug;

    public function __construct() {
        $this->pdo = new Banco();
        $this->debug = true;
    }

    public function Cadastrar(Clientes $clientes) {
        try {
            $sql = "INSERT INTO `clientes` (nome, nascimento, rg, cpf, endereco, bairro, numero, complemento, celular, residencial, email, indicacao, data, status, dr) VALUES (:nome, :nascimento, :rg, :cpf, :endereco, :bairro, :numero, :complemento, :celular, :residencial, :email, :indicacao, :data, :status, :dr)";
            $param = array(
                ":nome" => $clientes->getNome(),
                ":nascimento" => $clientes->getNascimento(),
                ":rg" => $clientes->getRg(),
                ":cpf" => $clientes->getCpf(),
                ":endereco" => $clientes->getEndereco(),
                ":bairro" => $clientes->getBairro(),
                ":numero" => $clientes->getNumero(),
                ":complemento" => $clientes->getComplemento(),
                ":celular" => $clientes->getCelular(),
                ":residencial" => $clientes->getResidencial(),
                ":email" => $clientes->getEmail(),
                ":indicacao" => $clientes->getIndicacao(),
                ":data" => $clientes->getData(),
                ":status" => 1,
                ":dr" => $clientes->getDr()
            );
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return false;
        }
    }
    public function RetornarUltimoClientes() {
        try {
            $sql = "SELECT * FROM clientes WHERE status = 1 ORDER BY id DESC LIMIT 1";

            $dataTable = $this->pdo->ExecuteQuery($sql);

            $cod = 0;

            foreach ($dataTable as $resultado) {
                $clientes = new Clientes();

                $cod_cli = $resultado["id"];

                $cod = $cod_cli;
            }

            return $cod;
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return null;
        }
    }

}
