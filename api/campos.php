<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/dao/CampoDao.php';

$campoDao = new CampoDao();

$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        // Retrive Products
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);

            $campo = $campoDao->getCampoById($id);
            header('Content-Type: application/json');
            echo json_encode($campo);
        } else {
            $campo = $campoDao->getAll();
            header('Content-Type: application/json');
            echo json_encode($campo);
        }
        break;
    case 'POST':
        $campo['idTipoCampo'] = $_POST['idTipoCampo'];
        $campo['id_empresa'] = $_POST['id_empresa'];
        $campo['comprimento'] = $_POST['comprimento'];
        $campo['largura'] = $_POST['largura'];
        

        if ($campoDao->inserirCampo($campo)) {
            $response = array(
                'status' => 1,
                'status_message' => 'Campo Adicionado com sucesso.'
            );
        } else {
            $response = array(
                'status' => 0,
                'status_message' => 'Falha ao Adicionar Campo.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);

        break;
    case 'PUT':
        // Update Product
        parse_str(file_get_contents("php://input"), $post_vars);
        $campo['id'] = intval($_GET["id"]);
        $campo['idTipoCampo'] = $post_vars['idTipoCampo'];
        $campo['id_empresa'] = $post_vars['id_empresa'];
        $campo['comprimento'] = $post_vars['comprimento'];
        $campo['largura'] = $post_vars['largura'];
        

        if ($resposta = $campoDao->atualizarCampo($campo)) {
            $response = array(
                'status' => 1,
                'status_message' => 'Campo Atualizado com sucesso.'
            );
        } else {
            $response = array(
                'status' => 0,
                'status_message' => 'Falha ao Atualizar Campo.'.$resposta
            );
            
        }
        header('Content-Type: application/json');
        echo json_encode($response);

        break;
    case 'DELETE':
        // Delete Product
        $id = intval($_GET["id"]);
        
        if ($campoDao->deletarCampo($id)) {
            $response = array(
                'status' => 1,
                'status_message' => 'Campo Deletado com sucesso.'
            );
        } else {
            $response = array(
                'status' => 0,
                'status_message' => 'Falha ao Deletar Campo.'
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

