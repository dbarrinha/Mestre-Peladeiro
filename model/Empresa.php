<?php

class Empresa{
    private $id;
    private $idUsuario;
    private $nome;
    private $cnpj;
    
    function getId() {
        return $this->id;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }


}

