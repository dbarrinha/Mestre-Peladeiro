<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ReservaDao.php';

$reservaDao = new ReservaDao();

$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        // Retrive Products
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);

            $reserva = $reservaDao->getReservaById($id);
            header('Content-Type: application/json');
            echo json_encode($reserva);
        } else {
            $reserva = $reservaDao->getAll();
            header('Content-Type: application/json');
            echo json_encode($reserva);
        }
        break;
    case 'POST':
        $reserva['idStatusReserva'] = $_POST['idStatusReserva'];
        $reserva['idUsuario'] = $_POST['idUsuario'];
        $reserva['idEmpresa'] = $_POST['idEmpresa'];
        $reserva['idCampo'] = $_POST['idCampo'];
        $reserva['dataInicio'] = $_POST['dataInicio'];
        $reserva['dataFim'] = $_POST['dataFim'];
        $reserva['taxaPreReserva'] = $_POST['taxaPreReserva'];
        $reserva['taxaReserva'] = $_POST['taxaReserva'];

        if ($reservaDao->inserirReserva($reserva)) {
            $response = array(
                'status' => 1,
                'status_message' => 'Reserva Adicionada com sucesso.'
            );
        } else {
            $response = array(
                'status' => 0,
                'status_message' => 'Falha ao Adicionar Reserva.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);

        break;
    case 'PUT':
        // Update Product
        parse_str(file_get_contents("php://input"), $post_vars);
        $reserva['id'] = intval($_GET["id"]);
        $reserva['idStatusReserva'] = $post_vars['idStatusReserva'];
        $reserva['idUsuario'] = $post_vars['idUsuario'];
        $reserva['idEmpresa'] = $post_vars['idEmpresa'];
        $reserva['idCampo'] = $post_vars['idCampo'];
        $reserva['dataInicio'] = $post_vars['dataInicio'];
        $reserva['dataFim'] = $post_vars['dataFim'];
        $reserva['taxaPreReserva'] = $post_vars['taxaPreReserva'];
        $reserva['taxaReserva'] = $post_vars['taxaReserva'];
        

        if ($resposta = $reservaDao->atualizarReserva($reserva)) {
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
        $response = array(
                'status' => 0,
                'status_message' => 'Falha ao Deletar Campo. Reservas não podem ser deletadas por motivo de segurança'
            );
        
        header('Content-Type: application/json');
        echo json_encode($response);
        
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

