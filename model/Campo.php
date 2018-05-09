<?php

class Campo{
    private $id;
    private $idTipoCampo;
    private $idEmpresa;
    private $compirmento;
    private $largura;
    function getId() {
        return $this->id;
    }

    function getIdTipoCampo() {
        return $this->idTipoCampo;
    }

    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function getCompirmento() {
        return $this->compirmento;
    }

    function getLargura() {
        return $this->largura;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdTipoCampo($idTipoCampo) {
        $this->idTipoCampo = $idTipoCampo;
    }

    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    function setCompirmento($compirmento) {
        $this->compirmento = $compirmento;
    }

    function setLargura($largura) {
        $this->largura = $largura;
    }


}

