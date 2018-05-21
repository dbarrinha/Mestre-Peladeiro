<?php

$data = array ( 
		'nome' => 'Novo usuario', 
		'sobrenome' => 'Sobrenome', 
		'idTipo' => 1, 
		'rg' => '5435345',
                'cpf' => '53453453' ,
                'email' => 'teste@gmail.com' ,
                'senha' => '1234' 
); 
$url = 'http://localhost/api/users.php'; 
$ch = curl_init ($url); 
curl_setopt ($ch, CURLOPT_POST, true); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, $data); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true); 
$response_json = curl_exec ($ch); 
curl_close ($ch); 
$response = json_decode ($response_json, true);

echo $response_json;

