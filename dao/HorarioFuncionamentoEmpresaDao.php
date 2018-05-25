<?php

class HorarioFuncionamentoEmpresaDao{
    
    public function atualizarHorario($horario){
      $con = ConexaoDao::getConexao();
      $query = "UPDATE horario_funcion_empresa SET id_empresa=?, id_dia_semana=?, horario_inicio=?"
              . ", horario_fim=? WHERE id=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iissi", $horario['id_empresa'], $horario['id_dia_semana'], $horario['horario_inicio'], 
            $horario['horario_fim'], $horario['id']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
   
   public function inserirHorario($horario){
      $con = ConexaoDao::getConexao();
      $query = "INSERT INTO horario_funcion_empresa VALUES (NULL,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiss", $horario['id_empresa'], $horario['id_dia_semana'], $horario['horario_inicio'], 
            $horario['horario_fim']);
      if($stmt->execute()===TRUE){
         $stmt->close();
         $con->close();
         return TRUE;
      }else{
         $erro = $stmt->errno.' - '.$stmt->error;
         return $erro;
      }
   }
  
   
   public function getHorarioById($id){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM horario_funcion_empresa WHERE id=?";
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
   
   public function getHorarioByEmpresa($idEmpresa){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM horario_funcion_empresa WHERE id_empresa=?";
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


