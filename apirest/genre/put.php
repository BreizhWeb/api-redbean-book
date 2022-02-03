<?php
$url = "http://127.0.0.1/Api/apirest/genre/genre/2"; // modifier le genre 2
$data = array('nomGenre' => 'TestGenreModif');

$ch = ($url);
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