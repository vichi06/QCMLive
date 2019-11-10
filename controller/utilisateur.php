<?php 
// FONCTIONS CONCERNANT UN UTILISATEUR 

// IDENTIFICATION A LA BASE DE DONNEES
function ident() {
	$login_utilisateur = isset($_GET['login_utilisateur'])?($_GET['login_utilisateur']):'';
	$pass_utilisateur = isset($_GET['pass_utilisateur'])?($_GET['pass_utilisateur']):'';
	$type_utilisateur = isset($_GET['type_utilisateur'])?($_GET['type_utilisateur']):'';


    if  (!verif_ident($login_utilisateur,$pass_utilisateur,$type_utilisateur)) {
		$url = "index.php?action=login&type_utilisateur=" .$type_utilisateur;
		header("Location:" .$url) ;	
	}
    else {	
		$url = "index.php?action=logged&type_utilisateur=" .$type_utilisateur;
		header("Location:" .$url);
	}
}

// VERIFICATION IDENTIFICATION
// @param Données à vérifiées
function verif_ident($login_utilisateur,$pass_utilisateur,$type_utilisateur) {
	require ('./model/utilisateurBD.php');
	return verif_ident_BD($login_utilisateur,$pass_utilisateur,$type_utilisateur); //true ou false en base;
}


