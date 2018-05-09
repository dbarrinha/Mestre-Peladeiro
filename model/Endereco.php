<?php

class Endereco{
    private $id;
    private $idUsuario;
    private $rua;
    private $bairro;
    private $cidade;
    private $estado;
    private $longitude;
    private $latitude;
    
    function getId() {
        return $this->id;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getRua() {
        return $this->rua;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getLongitude() {
        return $this->longitude;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }


}

