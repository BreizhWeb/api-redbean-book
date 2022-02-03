<?php
	// Connect to database
	include("../db_connect.php");
		// accéder à la bonne méthode
	$request_method = $_SERVER["REQUEST_METHOD"];

	function getPersonnes()
	{
		global $conn;
		// requete sql select all
		$query = "SELECT * FROM personne";
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
	
	function getPersonne($id=0)
	{
		global $conn;
		// requete sql select par id
		$query = "SELECT * FROM personne";
		if($id != 0)
		{
			$query .= " WHERE idPersonne=".$id." LIMIT 1";
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
	
	function AddPersonne()
	{	global $conn;
		// récupération des données à insérer
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$auteur = $_POST["auteur"];
		echo $query="INSERT INTO personne(nom, prenom, auteur) VALUES('".$nom."', '".$prenom."', '".$auteur."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'personne ajout� avec succ�s.'
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
	
	function updatePersonne($id)
	{
		global $conn;
		$_PUT = array();
		//  Reli le fichier input.php
		parse_str(file_get_contents('php://input'), $_PUT);
		$nom = $_PUT["nom"];
		$prenom = $_PUT["prenom"];
		$auteur = $_PUT["auteur"];
		$query="UPDATE personne SET nom='".$nom."', prenom='".$prenom."', auteur='".$auteur."' WHERE idPersonne=".$id;
		
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'personne mis a jour avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise a jour de personne. '. mysqli_error($conn)
			);
			
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function deletePersonne($id)
	{
		global $conn;
		$query = "DELETE FROM personne WHERE idPersonne=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'personne supprime avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'La suppression du personne a echoue. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	// changer de méthode CRUD
	switch($request_method)
	{
		
		case 'GET':
			// Retrive Personne
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				getPersonne($id);
			}
			else
			{
				getPersonne();
			}
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			// Ajouter un personne
			AddPersonne();
			break;
			
		case 'PUT':
			// Modifier un personne
			$id = intval($_GET["id"]);
			updatePersonne($id);
			break;
			
		case 'DELETE':
			// Supprimer un personne
			$id = intval($_GET["id"]);
			deletePersonne($id);
			break;

	}
?>