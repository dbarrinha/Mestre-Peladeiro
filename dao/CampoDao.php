<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';

class CampoDao{
   
   public function atualizarCampo($campo){
      $con = ConexaoDao::getConexao();
      $query = "UPDATE campo SET id_tipo_campo=?, id_empresa=?, comprimento=?, "
              . "largura=? WHERE id=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiddi", $campo['id_tipo_campo'], $campo['id_empresa'], 
            $campo['comprimento'], $campo['largura'], $campo['id']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function inserirCampo($campo){
      $con = ConexaoDao::getConexao();
      $query = "INSERT INTO campo VALUES (NULL,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iidd", $campo['id_tipo_campo'], $campo['id_empresa'], 
            $campo['comprimento'], $campo['largura']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function deletarCampo($id){
      $con = ConexaoDao::getConexao();
      $query = "DELETE from campo WHERE id=?";
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
   
   public function getCampoById($id){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM view_campo WHERE id=?";
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
   
   public function getAll(){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM view_campo";
      $stmt = $con->prepare($query);
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
   
   public function getCamposByEmpresa($idEmpresa){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM view_campo WHERE id_empresa=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $idEmpresa);
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