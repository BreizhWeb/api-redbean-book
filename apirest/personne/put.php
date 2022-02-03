<?php
$url = "http://127.0.0.1/Api/apirest/personne/personne/1"; // modifier le personne 1
$data = array('nom' => 'nommm', 'prenom' => 'PrenomModif', 'auteur' => 1);

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