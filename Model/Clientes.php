<?php
        
class Clientes {

   
    private $id;
    private $nome;
    private $nascimento;
    private $rg;
    private $cpf;
    private $endereco;
    private $bairro;
    private $numero;
    private $complemento;
    private $celular;
    private $residencial;
    private $email;
    private $indicacao;
    private $data;
    private $status;
    private $dr;
    
    function getBairro() {
        return $this->bairro;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

        
    function getDr() {
        return $this->dr;
    }

    function setDr($dr) {
        $this->dr = $dr;
    }

    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getNascimento() {
        return $this->nascimento;
    }

    function getRg() {
        return $this->rg;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getNumero() {
        return $this->numero;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getCelular() {
        return $this->celular;
    }

    function getResidencial() {
        return $this->residencial;
    }


    function getIndicacao() {
        return $this->indicacao;
    }

    function getData() {
        return $this->data;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setResidencial($residencial) {
        $this->residencial = $residencial;
    }

    function setIndicacao($indicacao) {
        $this->indicacao = $indicacao;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }


    
    
}
?>








