<?php

class HistoricoReserva{
   private $id;
   private $idReserva;
   private $idStatusReserva;
   private $data;
   
   function getId() {
       return $this->id;
   }

   function getIdReserva() {
       return $this->idReserva;
   }

   function getIdStatusReserva() {
       return $this->idStatusReserva;
   }

   function getData() {
       return $this->data;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setIdReserva($idReserva) {
       $this->idReserva = $idReserva;
   }

   function setIdStatusReserva($idStatusReserva) {
       $this->idStatusReserva = $idStatusReserva;
   }

   function setData($data) {
       $this->data = $data;
   }


}

