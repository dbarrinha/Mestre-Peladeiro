<?php

require_once '../dao/UsuarioDao.php';
header('Content-Type: application/json');

function api_usuario(){
   $variaveis = file_get_contents("php://input");
   
   $metodo = $_SERVER["REQUEST_METHOD"];
   
   switch ($metodo) {
      case 'GET':
         api_get_usuario($variaveis);
         break;
      case 'POST':
         api_post_usuario($variaveis);
         break;
      case 'PUT':
         api_put_usuario($variaveis);
         break;
       case 'DELETE':
         api_delete_usuario($variaveis);
         break;
       default:
           header("HTTP/1.0 405 Method Not Allowed");
           break;
   }
}

function api_get_usuario($conteudo){
   $array = array();
   parse_str($conteudo, $array);   
   $usuarioDao = new UsuarioDao();
   if(isset($_GET['id'])){
      $usuario = $usuarioDao->getUsuarioById($_GET['id']);
      echo json_encode($usuario);
   }
   elseif(isset($array['id'])) {
      $usuario = $usuarioDao->getUsuarioById($array['id']);
      echo json_encode($usuario);
   } else {
      $usuario = $usuarioDao->getAll();
      echo json_encode($usuario);
   }
}

function api_post_usuario($conteudo){
   $array = array();
   parse_str($conteudo, $array);   
   $usuarioDao = new UsuarioDao();   
   $resultado = $usuarioDao->inserirUsuario($array);
   if (is_bool($resultado) && $resultado===TRUE) {
      $response = array(
         'status' => 1,
         'status_message' => 'Usuario Adicionado com sucesso.'
      );
   }else {
      $response = array(
         'status' => 0,
         'status_message' => 'Falha ao Adicionar Usuario.'
      );
   }
   echo json_encode($response);
}

function api_put_usuario($conteudo){   
   $array = array();
   parse_str($conteudo, $array);   
   $usuarioDao = new UsuarioDao();   
   $resultado = $usuarioDao->atualizarUsuario($array);
   if (is_bool($resultado) && $resultado===TRUE) {
      $response = array(
         'status' => 1,
         'status_message' => 'Usuario Atualizado com sucesso.'
      );
   } else {
      $response = array(
         'status' => 0,
         'status_message' => 'Falha ao Atualizar Usuario.'
      );
   }
  echo json_encode($response);
}

function api_delete_usuario($conteudo){
   $array = array();
   parse_str($conteudo, $array);
   $usuarioDao = new UsuarioDao();
   $resultado = $usuarioDao->deletarUsuario($array['id']);
   if (is_bool($resultado) && $resultado===TRUE) {
         $response = array(
             'status' => 1,
             'status_message' => 'Usuario Deletado com sucesso.'
         );
     } else {
         $response = array(
             'status' => 0,
             'status_message' => 'Falha ao Deletar Usuario.'
         );
     }
     echo json_encode($response);
}
api_usuario();