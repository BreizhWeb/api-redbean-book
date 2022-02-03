<?php
	$url = 'http://127.0.0.1/Api/apirest/genre/genre/'; // ajoute un genre
	$data = array('nomGenre' => 'TestNomAdd'); 

	// use key 'http' even if you send the request to https://...
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);
	//  Crée un contexte de flux
	$context  = stream_context_create($options);
	// Lit tout un fichier dans une chaîne
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { /* Handle error */ }

	var_dump($result);
?>