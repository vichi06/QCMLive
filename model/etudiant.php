<?php 

// VERIFIER SI TEST/SESSION EN COURS POUR LE TITRE ET GROUPE DONNE
function verif_test_available($nomTest) {
	require('frontEnd.php');
	$bdd = dbConnect();

	$sql = "SELECT bActif FROM test WHERE titre_test=:nomTest";

	$resultat = array(); 
	
	try {
		$req = $bdd->prepare($sql);
		$req ->execute(array(':nomTest' => $nomTest));
		$resultat = $req->fetch(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}

	if($resultat['bActif'] == 1){
		return true;
	}
	else {
		return false;
	}
}

// 
function getNumGroupe() {
    $numGroupe;

    $sql="SELECT num_grpe FROM etudiant WHERE login_etu =:nom";

    try {
		$req = $bdd->prepare($sql);
		$req ->execute(array(':nom' => $_SESSION['nom']));
		$resultat = $req->fetchAll();
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}

    return $numGroupe;
}


function getNomEtudiant($login_etu) {
    $numGroupe;

    $sql="SELECT nom FROM etudiant WHERE login_etu =:login_etu";

    try {
		$req = $bdd->prepare($sql);
		$req ->execute(array(':login_etu' => $login_etu));
		$resultat = $req->fetchAll();
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}

    return $numGroupe;
}

function session_enCours() {
	
}