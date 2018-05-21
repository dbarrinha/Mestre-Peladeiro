<?php

require_once '../dao/UsuarioDao.php';

$usuarioDao = new UsuarioDao();

$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        // Retrive Products
        if (!empty($_GET["id"])) {
            $user_id = intval($_GET["id"]);

            $usuario = $usuarioDao->getUsuarioById($user_id);
            header('Content-Type: application/json');
            echo json_encode($usuario);
        } else {
            $usuario = $usuarioDao->getAll();
            header('Content-Type: application/json');
            echo json_encode($usuario);
        }
        break;
    case 'POST':
        $usuario['idTipo'] = $_POST['idTipo'];
        $usuario['nome'] = $_POST['nome'];
        $usuario['sobrenome'] = $_POST['sobrenome'];
        $usuario['rg'] = $_POST['rg'];
        $usuario['cpf'] = $_POST['cpf'];
        $usuario['email'] = $_POST['email'];
        $usuario['senha'] = $_POST['senha'];
        

        if ($usuarioDao->inserirUsuario($usuario)) {
            $response = array(
                'status' => 1,
                'status_message' => 'Usuario Adicionado com sucesso.'
            );
        } else {
            $response = array(
                'status' => 0,
                'status_message' => 'Falha ao Adicionar Usuario.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);

        break;
    case 'PUT':
        // Update Product
        parse_str(file_get_contents("php://input"), $post_vars);
        $usuario['id'] = intval($_GET["id"]);
        $usuario['idTipo'] = $post_vars['idTipo'];
        $usuario['nome'] = $post_vars['nome'];
        $usuario['sobrenome'] = $post_vars['sobrenome'];
        $usuario['rg'] = $post_vars['rg'];
        $usuario['cpf'] = $post_vars['cpf'];
        $usuario['email'] = $post_vars['email'];
        $usuario['senha'] = $post_vars['senha'];
        

        if ($resposta = $usuarioDao->atualizarUsuario($usuario)) {
            $response = array(
                'status' => 1,
                'status_message' => 'Usuario Atualizado com sucesso.'
            );
        } else {
            $response = array(
                'status' => 0,
                'status_message' => 'Falha ao Atualizar Usuario.'.$resposta
            );
            
        }
        header('Content-Type: application/json');
        echo json_encode($response);

        break;
    case 'DELETE':
        // Delete Product
        $user_id = intval($_GET["id"]);
        
        if ($usuarioDao->deletarUsuario($user_id)) {
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
        header('Content-Type: application/json');
        echo json_encode($response);
        
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

