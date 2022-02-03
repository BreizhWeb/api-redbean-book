<?php
	// Connect to database
	include("../db_connect.php");
	// accéder à la bonne méthode
	$request_method = $_SERVER["REQUEST_METHOD"];

	function getGenres()
	{
		global $conn;
		// requete sql select all
		$query = "SELECT * FROM genre";
		// création d'un tableau
		$response = array();
		// Exécute une requête sur la base de données
		$result = mysqli_query($conn, $query);
		// Met tous les requetes dans un tableau
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function getGenre($id=0)
	{
		global $conn;
		// requete sql select par id
		$query = "SELECT * FROM Genre";
		if($id != 0)
		{
			$query .= " WHERE idGenre=".$id." LIMIT 1";
		}
		// création d'un tableau
		$response = array();
		// Exécute une requête sur la base de données
		$result = mysqli_query($conn, $query);
		// Met tous les requetes dans un tableau
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function AddGenre()
	{	global $conn;
		// récupération des données à insérer
		$nomGenre = $_POST["nomGenre"];
		echo $query="INSERT INTO Genre(nomGenre) VALUES('".$nomGenre."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Genre ajout� avec succ�s.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'ERREUR!.'. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function updateGenre($id)
	{
		global $conn;
		$_PUT = array();
		//  Reli le fichier input.php
		parse_str(file_get_contents('php://input'), $_PUT);
		$nomGenre = $_PUT["nomGenre"];
		$query="UPDATE Genre SET nomGenre='".$nomGenre."' WHERE idGenre=".$id;
		
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Genre mis a jour avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise a jour de Genre. '. mysqli_error($conn)
			);
			
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function deleteGenre($id)
	{
		global $conn;
		$query = "DELETE FROM Genre WHERE idGenre=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Genre supprime avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'La suppression du Genre a echoue. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	// changer de méthode CRUD
	switch($request_method)
	{
		
		case 'GET':
			// Retrive Genre
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				getGenre($id);
			}
			else
			{
				getGenre();
			}
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			// Ajouter un Genre
			AddGenre();
			break;
			
		case 'PUT':
			// Modifier un Genre
			$id = intval($_GET["id"]);
			updateGenre($id);
			break;
			
		case 'DELETE':
			// Supprimer un Genre
			$id = intval($_GET["id"]);
			deleteGenre($id);
			break;

	}
?>