<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ultilitarios/funcoes_especiais.php';
//$url = "http://starbit.000webhostapp.com/api/users.php";
$url = "http://localhost/api/users.php";

$variaveis = array(
   'id'=>"1",
   'id_tipo_usuario'=>"1",
   'nome'=>"Nome do usuário2",
   'sobrenome'=>"Sobrenome2",
   'rg'=>"12346",
   'cpf'=>"78910",
   'email'=>"email@emal.com",
   'senha'=>"senha123",
    
    
);
$metodo = "PUT";
echo fazer_requisicao($url, $variaveis, $metodo);