<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/UsuarioDao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/Usuario.php';


$usuario = new Usuario();

$usuarioDao = new UsuarioDao();
$usuarios = $usuarioDao->getAll();

if (!$usuarios == false) {
    foreach ($usuarios as $valor) {
        echo json_encode($valor);
    }
} else {
    echo json_encode(
            array("message" => "Usuarios Não Encontrados")
    );
}
?>

