<?php

class ReservaDao {
    
    public function atualizarReserva($reserva){
      $con = ConexaoDao::getConexao();
      $query = "UPDATE reserva SET id_status_reserva=?, id_usuario=?, id_empresa=?, id_campo=?, data_inicio=?"
              . ", data_fim=?, taxa_pre_reserva=?, taxa_reserva=? WHERE id=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiissddi", $reserva['id_status_reserva'], $reserva['id_usuario'], $reserva['id_empresa'], 
            $reserva['id_campo'],$reserva['data_inicio'], $reserva['data_fim'],  $reserva['taxa_pre_reserva'], $reserva['taxa_reserva'], $reserva['id']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function inserirReserva($reserva){
      $con = ConexaoDao::getConexao();
      $query = "INSERT INTO reserva VALUES (NULL,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiissdd", $reserva['id_status_reserva'], $reserva['id_usuario'], $reserva['id_empresa'], 
            $reserva['id_campo'],$reserva['data_inicio'], $reserva['data_fim'],  $reserva['taxa_pre_reserva'], $reserva['taxa_reserva']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
  
   
   public function getReservaById($id){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM reserva WHERE id=?";
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
   
   public function getReservaByUsuario($idUsuario){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM reserva WHERE id_usuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $idUsuario);
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
