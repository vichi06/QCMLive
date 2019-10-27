<?php 
function verif_ident_BD($nom,$mdp,$type){	
	require('frontEnd.php');
	$bdd = dbConnect();

	$resultat= array(); 

	// SI ELEVE --> REQUETE
	if($type == 'eleve') {
		$sql="SELECT login_etu, pass_etu, nom, prenom, num_grpe, date_etu, genre, email FROM etudiant 
		WHERE login_etu =:nom AND pass_etu=:mdp";
		
		try {
			$req = $bdd->prepare($sql);
			$req ->execute(array(':nom' => $nom, ':mdp' => $mdp));
			$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
	}

	// SI PROFESSEUR --> REQUETE
	if($type == 'professeur') {
		$sql="SELECT login_prof, pass_prof, nom, prenom, email, date_prof FROM professeur 
		WHERE login_prof =:nom AND pass_prof=:mdp";
		
		try {
			$req = $bdd->prepare($sql);
			$req ->execute(array(':nom' => $nom, ':mdp' => $mdp));
			$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
	}
	
	// RESULTATS 
	if (empty($resultat)) {
		return false;
	}
	else {
		return true;
	}
}


