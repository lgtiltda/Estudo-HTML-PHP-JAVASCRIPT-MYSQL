<?php

if (file_exists("../DAL/UsuariosDAO.php")) {
    require_once("../DAL/UsuariosDAO.php");
} else if (file_exists("DAL/UsuariosDAO.php")) {
    require_once("DAL/UsuariosDAO.php");
} else {
    require_once("../../DAL/UsuariosDAO.php");
}

class UsuarioController {

    private $usuariosDAO;

    public function __construct() {
        $this->usuariosDAO = new UsuarioDAO();
    }

    public function RetornarUsuarios(string $termo, int $tipo, int $status) {
        if (strlen($termo) >= 0 && $tipo > 0 && $status >= 0) {
            return $this->usuariosDAO->RetornarUsuarios($termo, $tipo, $status);
        } else {
            return false;
        }
    }

    public function AutenticarUsuario(string $usu, string $senha, int $permissao) {
        if (strlen($usu) >= 1 && strlen($senha) >= 1 && $permissao > 0 && $permissao < 4) {
            $senha = md5($senha);
            return $this->usuariosDAO->AutenticarUsuario($usu, $senha, $permissao);
        } else {
            return null;
        }
    }
}
