<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';

class EmpresaDao{
   
   public function atualizarEmpresa($empresa){
      $con = ConexaoDao::getConexao();
      $query = "UPDATE empresa SET id_usuario=?, nome=?, cnpj=? WHERE id=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("issi", $empresa['id_usuario'], $empresa['nome'], 
            $empresa['cnpj'], $empresa['id']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function inserirEmpresa($empresa){
      $con = ConexaoDao::getConexao();
      $query = "INSERT INTO empresa VALUES (NULL,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iidd", $empresa['id_usuario'], $empresa['nome'], $empresa['cnpj']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function deletarEmpresa($id){
      $con = ConexaoDao::getConexao();
      $query = "DELETE FROM empresa WHERE id=?";
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
   
   public function getEmpresaById($id){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM empresa WHERE id=?";
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
   
   public function getTodasEmpresas(){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM empresa";
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
   
}