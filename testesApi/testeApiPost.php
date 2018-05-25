<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ultilitarios/funcoes_especiais.php';
//$url = "http://starbit.000webhostapp.com/api/users.php";
$url = "http://localhost/api/users.php";

$variaveis = array(
   'id_tipo_usuario'=>"1",
   'nome'=>"Nome do usuário",
   'sobrenome'=>"Sobrenome",
   'rg'=>"12346",
   'cpf'=>"78910",
   'email'=>"email@emal.com",
   'senha'=>"senha123",
    
    
);
$metodo = "POST";
echo fazer_requisicao($url, $variaveis, $metodo);