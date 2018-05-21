<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';

class HistoricoReservaDao{
   
   public function atualizarHistoricoReserva($historico){
      $con = ConexaoDao::getConexao();
      $query = "UPDATE hist_reserva SET id_reserva=?, id_status_reserva=?, data=? WHERE id=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iisi", $historico['id_reserva'], $historico['id_status_reserva'], 
            $historico['data'], $historico['id']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function inserirHistReserva($historico){
      $con = ConexaoDao::getConexao();
      $query = "INSERT INTO hist_reserva VALUES (NULL,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iis", $historico['id_reserva'], $historico['id_status_reserva'], 
            $historico['data']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function deletarHistReserva($id){
      $con = ConexaoDao::getConexao();
      $query = "DELETE FROM hist_reserva WHERE id=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $id);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function getHistReservaById($id){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM hist_reserva WHERE id=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $id);
      if($stmt->execute()===TRUE){
         $result = $stmt->get_result();
         $arrayCampo = $result->fetch_assoc();
         $stmt->close();
         $con->close();
         return $arrayCampo;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function getHistReservaByIdReserva($id_reserva){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM hist_reserva WHERE id_reserva=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $id_reserva);
      if($stmt->execute()===TRUE){
         $result = $stmt->get_result();
         $arrayCampo = $result->fetch_all(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $arrayCampo;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
}