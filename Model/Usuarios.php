<?php

class Usuarios {

    private $cod;
    private $nome;
    private $usuario;
    private $rg;
    private $cpf;
    private $email;
    private $cod_orgao;
    private $funcao;
    private $foto;
    private $permissao;
    private $rua;
    private $bairro;
    private $numero;
    private $celular;
    private $senha;
    private $comissao;
    
    function getFuncao() {
        return $this->funcao;
    }

    function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

        
    function getCod_orgao() {
        return $this->cod_orgao;
    }

    function setCod_orgao($cod_orgao) {
        $this->cod_orgao = $cod_orgao;
    }

        function getComissao() {
        return $this->comissao;
    }

    function setComissao($comissao) {
        $this->comissao = $comissao;
    }

        
    function getSenha() {
        return $this->senha;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function getCod() {
        return $this->cod;
    }

    function getNome() {
        return $this->nome;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getRg() {
        return $this->rg;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getFoto() {
        return $this->foto;
    }

    function getPermissao() {
        return $this->permissao;
    }

    function getRua() {
        return $this->rua;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getNumero() {
        return $this->numero;
    }

    function getCelular() {
        return $this->celular;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setPermissao($permissao) {
        $this->permissao = $permissao;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

}
?>








