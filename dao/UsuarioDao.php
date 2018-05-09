<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ConexaoDao.php';

class UsuarioDao {
    public function atualizarUsuario($usuario){
        $con = ConexaoDao::getConexao();
        $query = "UPDATE usuario SET id_tipo_usuario=?, nome=?, sobrenome=?, "
                . "rg=?, descricao=?, cpf=? ,email=? ,senha=? WHERE id=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("issssssi", $usuario['idTipo'], $usuario['nome'], 
                $usuario['sobrenome'], $usuario['rg'],$usuario['cpf'], 
                $usuario['email'], $usuario['senha'],  $usuario['id']);
        if($stmt->execute()===TRUE){
            $stmt->close();
            $con->close();
            return TRUE;
        }else{
            $erro = $stmt->errno.' - '.$stmt->error;
            return $erro;
        }
    }
    
    public function inserirUsuario($usuario){
        $con = ConexaoDao::getConexao();
        $query = "INSERT INTO usuario VALUES (NULL,?,?,?,?,?,?,?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("issssss", $usuario['idTipo'], $usuario['nome'], 
                $usuario['sobrenome'], $usuario['rg'],$usuario['cpf'], 
                $usuario['email'], $usuario['senha']);
        if($stmt->execute()===TRUE){
            $stmt->close();
            $con->close();
            return TRUE;
        }else{
            $erro = $stmt->errno.' - '.$stmt->error;
            return $erro;
        }
    }
    
    public function deletarUsuario($id){
        $con = ConexaoDao::getConexao();
        $query = "DELETE FROM usuario WHERE id=?";
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
    
    public function getUsuarioById($id){
        $con = ConexaoDao::getConexao();
        $query = "SELECT * FROM usuario WHERE id=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        if($stmt->execute()===TRUE){
            $result = $stmt->get_result();
            $arrayUsuario = $result->fetch_assoc();
            $stmt->close();
            $con->close();
            return $arrayUsuario;
        }else{
            $erro = $stmt->errno.' - '.$stmt->error;
            return $erro;
        }
    }
    
   public function getAll(){
      $con = ConexaoDao::getConexao();
      $query = "SELECT * FROM usuario";
      $stmt = $con->prepare($query);
      if($stmt->execute()===TRUE){
         $result = $stmt->get_result();
         $arrayUsuario = $result->fetch_all(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $arrayUsuario;
      }else{
         echo $erro = $stmt->errno.' - '.$stmt->error;
         return false;
      }
   }
 
}