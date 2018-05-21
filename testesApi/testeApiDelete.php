<?php
$url = 'http://localhost/api/users.php?id=6';//tem que informar o id
$ch = curl_init ($url); 
curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true); 
$response_json = curl_exec ($ch); 
curl_close ($ch); 
$response = json_decode ($response_json, true);
echo $response_json;
