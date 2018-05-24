<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';
class TipoCampoDao {
    
    public function getTipoCampoById($id){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM tipo_campo WHERE id=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $id);
      if($stmt->execute()===TRUE){
         $result = $stmt->get_result();
         $arrayDiaSemana = $result->fetch_assoc();
         $stmt->close();
         $con->close();
         return $arrayDiaSemana;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }

}

