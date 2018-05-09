<?php

class Reserva {
    private $id;
    private $idStatusReserva;
    private $idUsuario;
    private $idEmpresa;
    private $idCampo;
    private $dataInicio;
    private $dataFim;
    private $taxaPreReserva;
    private $taxaReserva;
    
    function getId() {
        return $this->id;
    }

    function getIdStatusReserva() {
        return $this->idStatusReserva;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function getIdCampo() {
        return $this->idCampo;
    }

    function getDataInicio() {
        return $this->dataInicio;
    }

    function getDataFim() {
        return $this->dataFim;
    }

    function getTaxaPreReserva() {
        return $this->taxaPreReserva;
    }

    function getTaxaReserva() {
        return $this->taxaReserva;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdStatusReserva($idStatusReserva) {
        $this->idStatusReserva = $idStatusReserva;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    function setIdCampo($idCampo) {
        $this->idCampo = $idCampo;
    }

    function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    function setDataFim($dataFim) {
        $this->dataFim = $dataFim;
    }

    function setTaxaPreReserva($taxaPreReserva) {
        $this->taxaPreReserva = $taxaPreReserva;
    }

    function setTaxaReserva($taxaReserva) {
        $this->taxaReserva = $taxaReserva;
    }


}
