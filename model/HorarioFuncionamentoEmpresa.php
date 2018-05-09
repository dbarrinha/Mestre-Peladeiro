<?php

class HorarioFuncionamentoEmpresa{
    private $id;
    private $idEmpresa;
    private $idDiaSemana;
    private $horaInicio;
    private $horaFim;
    
    function getId() {
        return $this->id;
    }

    function getIdEmpresa() {
        return $this->idEmpresa;
    }

    function getIdDiaSemana() {
        return $this->idDiaSemana;
    }

    function getHoraInicio() {
        return $this->horaInicio;
    }

    function getHoraFim() {
        return $this->horaFim;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    function setIdDiaSemana($idDiaSemana) {
        $this->idDiaSemana = $idDiaSemana;
    }

    function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }

    function setHoraFim($horaFim) {
        $this->horaFim = $horaFim;
    }


}

