<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';

class EnderecoDao{
   
   public function atualizarEndereco($endereco){
      $con = ConexaoDao::getConexao();
      $query = "UPDATE endereco SET id_usuario=?, rua=?, bairro=?, cidade=?, "
              . "estado=?, latitude=?, longitude=? WHERE id=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("issiiddi", $endereco['id_usuario'], $endereco['rua'], 
            $endereco['bairro'], $endereco['cidade'], $endereco['estado'], 
            $endereco['latitude'], $endereco['longitude'], $endereco['id']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function inserirEndereco($endereco){
      $con = ConexaoDao::getConexao();
      $query = "INSERT INTO endereco VALUES (NULL,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("issiidd", $endereco['id_usuario'], $endereco['rua'], 
            $endereco['bairro'], $endereco['cidade'], $endereco['estado'], 
            $endereco['latitude'], $endereco['longitude']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function deletarEndereco($id){
      $con = ConexaoDao::getConexao();
      $query = "DELETE FROM endereco WHERE id=?";
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
   
   public function getEnderecoById($id){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM endereco WHERE id=?";
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
   
   public function getEnderecosByUsuario($id_usuario){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM endereco WHERE id_usuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $id_usuario);
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