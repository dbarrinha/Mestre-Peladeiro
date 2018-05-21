<?php


$data = array ( 
		'nome' => 'Atualizado', 
		'sobrenome' => 'Sobrenome', 
		'idTipo' => 1, 
		'rg' => '5435345',
                'cpf' => '53453453' ,
                'email' => 'teste@gmail.com' ,
                'senha' => '1234' 
); 
$url = 'http://localhost/api/users.php?id=6'; //tem que informar o id
$ch = curl_init ($url); 
curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query($data)); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true); 
$response_json = curl_exec($ch); 
curl_close ($ch); 
$response = json_decode ($response_json, true);

echo $response_json;

