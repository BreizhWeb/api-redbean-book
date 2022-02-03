<?php
$url = "http://127.0.0.1/Api/apirest/livre/livre/2"; // modifier le livre 2
$data = array('titre' => 'titreeee', 'genre' => 'Roman', 'idAuteur' => 1);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

$response = curl_exec($ch);

var_dump($response);

if (!$response) 
{
    return false;
}
?>