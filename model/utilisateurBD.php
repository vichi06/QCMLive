<?php 

// VERIFIER IDENTIFIANT DANS BASE DONNEES
function verif_ident_BD($login_utilisateur,$pass_utilisateur,$type_utilisateur){	
	require('frontEnd.php');
	$bdd = dbConnect();

	$resultat= array(); 

	// SI ELEVE --> REQUETE
	if($type_utilisateur == 'etudiant') {
		$sql="SELECT login_etu, pass_etu, genre, nom, prenom, email, matricule, num_grpe, date_etu, bConnect FROM etudiant 
		WHERE login_etu =:login AND pass_etu=:pass";
		
		try {
			$req = $bdd->prepare($sql);
			$req ->execute(array(':login' => $login_utilisateur, ':pass' => $pass_utilisateur));
			$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
	}

	// SI PROFESSEUR --> REQUETE
	if($type_utilisateur ==	 'professeur') {
		$sql="SELECT login_prof, pass_prof, nom, prenom, email, date_prof, bConnect FROM professeur 
		WHERE login_prof =:login AND pass_prof=:pass";
		
		try {
			$req = $bdd->prepare($sql);
			$req ->execute(array(':login' => $login_utilisateur, ':pass' => $pass_utilisateur));
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
		// AFFECTATION VARIABLES SESSION
		$_SESSION['profil']['loginU'] = $login_utilisateur;
		$_SESSION['profil']['typeU'] = $type_utilisateur;
		
		return true;
	}
}


