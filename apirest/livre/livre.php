<?php
	// Connect to database
	include("../db_connect.php");
		// accéder à la bonne méthode
	$request_method = $_SERVER["REQUEST_METHOD"];

	function getLivres()
	{
		global $conn;
		// requete sql select all
		$query = "SELECT * FROM Livre";
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
	
	function getLivre($id=0)
	{
		global $conn;
		// requete sql select par id
		$query = "SELECT * FROM Livre";
		if($id != 0)
		{
			$query .= " WHERE idLivre=".$id." LIMIT 1";
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
	
	function AddLivre()
	{	global $conn;
		// récupération des données à insérer
		$titre = $_POST["titre"];
		$genre = $_POST["genre"];
		$idAuteur = $_POST["idAuteur"];
		echo $query="INSERT INTO Livre(titre, genre, idAuteur) VALUES('".$titre."', '".$genre."', '".$idAuteur."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Livre ajout� avec succ�s.'
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
	
	function updateLivre($id)
	{
		global $conn;
		$_PUT = array();
		//  Reli le fichier input.php
		parse_str(file_get_contents('php://input'), $_PUT);
		$titre = $_PUT["titre"];
		$genre = $_PUT["genre"];
		$idAuteur = $_PUT["idAuteur"];
		$query="UPDATE Livre SET titre='".$titre."', genre='".$genre."', idAuteur='".$idAuteur."' WHERE idLivre=".$id;
		
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Livre mis a jour avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise a jour de Livre. '. mysqli_error($conn)
			);
			
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function deleteLivre($id)
	{
		global $conn;
		$query = "DELETE FROM Livre WHERE idLivre=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Livre supprime avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'La suppression du Livre a echoue. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	// changer de méthode CRUD
	switch($request_method)
	{
		
		case 'GET':
			// Retrive Livre
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				getLivre($id);
			}
			else
			{
				getLivre();
			}
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			// Ajouter un Livre
			AddLivre();
			break;
			
		case 'PUT':
			// Modifier un Livre
			$id = intval($_GET["id"]);
			updateLivre($id);
			break;
			
		case 'DELETE':
			// Supprimer un Livre
			$id = intval($_GET["id"]);
			deleteLivre($id);
			break;

	}
?>