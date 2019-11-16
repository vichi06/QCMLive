<?php

function addNewTest($titreTest, $numGrpe) {
	require_once('./model/frontEnd.php');
	$bdd = dbConnect();

	$sql="INSERT INTO test(id_prof, num_grpe, titre_test, date_test, bActif) VALUES ('".$_SESSION['profil']['id']."','".$numGrpe."','".$titreTest."', DATE(NOW()), 0)";

	$resultat = array(); 

	try {
		$req = $bdd->prepare($sql);
		$req->execute(array());

	}
	catch (PDOException $e) {
		$msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die($msg); // On arrête tout.
	}  
} 





