<?php 
/*Fonctions-modèle réalisant la gestion d'une table de la base,
** ou par extension gérant un ensemble de tables. 
** Les appels à ces fcts se fp,t dans c1.
*/

	//echo ("Penser à modifier les paramètres de connect.php avant l'inclusion du fichier <br/>");
	//require ("modele/connect.php") ; //connexion MYSQL et sélection de la base, $link défini
	

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


