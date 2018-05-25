<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ultilitarios/funcoes_especiais.php';
//$url = "http://starbit.000webhostapp.com/api/users.php";
$url = "http://localhost/api/users.php";

$variaveis = array(
   'id'=>"3"
);
$metodo = "GET";
echo fazer_requisicao($url, $variaveis, $metodo);
