<?php 

// TESTS D'UN PROFESSEUR SOUS FORME D'UNE LISTE
function getTests($id_prof){
	require_once('./model/frontEnd.php');
	$bdd = dbConnect();
	
	$sql="SELECT titre_test FROM test WHERE id_prof =:id_prof";
	
	try {
		$sth = $bdd->prepare($sql);
		$sth->execute(array(':id_prof' => $id_prof));
		
		return $sth;
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

// GROUPE CORRESPONDANT A UN TEST
function getGroupe($titre_test){
	require_once('./model/frontEnd.php');
	$bdd = dbConnect();
	
	$sql="SELECT num_grpe FROM test WHERE titre_test=:titre";
    
    try {
		$sth = $bdd->prepare($sql);
		$sth->execute(array(':titre' => $titre_test));
		 
		//On récupère les données dans un tableau php
		$donnees = $sth->fetch(PDO::FETCH_ASSOC);
		
		return $donnees['num_grpe'];
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}


// THEMES DISPONIBLES
function getThemes(){
	require_once('./model/frontEnd.php');
	$bda = dbConnect();
	
	$sql="SELECT titre_theme FROM theme";
	
	try {
		$sth = $bda->prepare($sql);
		$sth->execute();
		
		return $sth;
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}	
}
