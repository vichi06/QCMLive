<?php 
function verif_ident_BD($nom,$mdp){	
	require('frontEnd.php');
	$bdd = dbConnect();

	//sql eleve

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

	//sql prof

	$sqlP="SELECT login_prof, pass_prof FROM professeur WHERE login_prof =:nom AND pass_prof=:mdp";
	
	$resultatP= array(); 
	
	try {
		$reqP = $bdd->prepare($sqlP);
		$reqP ->execute(array(':nom' => $nom, ':mdp' => $mdp));
		$resultatP = $reqP->fetchAll();
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
	
	if (empty($resultat) && empty($resultatP)){
		return false;
	}

	if(empty($resultat)){
		$_GET['type'] = "professeur";
	}
	
	if(empty($resultatP)){
		$_GET['type'] = "eleve";
	}

	return true;

}


