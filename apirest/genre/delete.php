<?php
$url = "http://127.0.0.1/Api/apirest/genre/genre/1"; // supprimer le genre 1
// Initialise une session cURL
$ch = curl_init();
// Définit une option de transmission cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Exécute une session cURL
$response  = curl_exec($ch);
// Affiche les informations d'une variable
var_dump($response);
// Ferme une session CURL
curl_close($ch);
?>