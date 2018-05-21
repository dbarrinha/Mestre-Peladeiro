<?php

$url = 'http://localhost/api/users.php';//pode informar o id se quiser 
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response = json_decode($response_json, true);

echo $response_json;

/*foreach ($response as $user){
    echo $user['nome'];
}*/

