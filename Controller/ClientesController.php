<?php

if (file_exists("../DAL/ClientesDAO.php")) {
    require_once("../DAL/ClientesDAO.php");
} else if (file_exists("DAL/ClientesDAO.php")) {
    require_once("DAL/ClientesDAO.php");
} else {
    require_once("../../DAL/ClientesDAO.php");
}

class ClientesController {

    private $clientesDAO;

    public function __construct() {
        $this->clientesDAO = new ClientesDAO();
    }

    public function Cadastrar($clientes) {
        if 
            (
                strlen($clientes->getNome()) >= 5
        ) {
            
            return $this->clientesDAO->Cadastrar($clientes);
            
        } else {
            return false;
        }
    }
}
