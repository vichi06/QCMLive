<?php 
function verif_ident_BD($nom,$mdp){	
	require('frontEnd.php');
	$bdd = dbConnect();

	$sql="SELECT login_etu, pass_etu FROM etudiant WHERE login_etu =:nom AND pass_etu=:mdp";
	$resultat= array(); 
	
	try {
		$req = $bdd->prepare($sql);
		$req ->execute(array(':nom' => $nom, ':mdp' => $mdp));
		$resultat = $req->fetchAll();
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
	
	if (empty($resultat)) return false; 
		// ou if (empty($resultat)) return false;
	else return true;
	//faire une  requête SQL 
}


