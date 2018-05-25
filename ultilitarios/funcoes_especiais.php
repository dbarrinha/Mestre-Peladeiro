<?php
function fazer_requisicao($url, $variaveis, $metodo){
   $conteudo = http_build_query($variaveis);

   $opts = array(
      'http'=>array(
         'method'=>$metodo,
         'header'=>"Connection: close\r\n".
         "Content-type: application/x-www-form-urlencoded\r\n".
         "Content-Length: ".strlen($conteudo)."\r\n",
         'content' => $conteudo
      )
   );
   $contexto = stream_context_create($opts);
   return file_get_contents($url, NULL, $contexto);   
}