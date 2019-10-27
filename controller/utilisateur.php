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
function verif_ident($login_utilisateur,$pass_utilisateur,$type_utilisateur) {
	require ('./model/utilisateurBD.php');
	return verif_ident_BD($login_utilisateur,$pass_utilisateur,$type_utilisateur); //true ou false en base;
}

// CONNEXION A LA SESSION EN COURS 
function connect_to_session($titreTest) {
	if(!verif_test($titreTest)) {
		$url = "index.php?action=logged&type_utilisateur=etudiant";
		header("Location:" .$url);
	}
	else {
		$_SESSION['test'] = $titreTest;
		$url = "index.php?action=logged&type_utilisateur=eleve&controle=test";
		header("Location:" .$url);
	}
}

// VERIFICATION SESSION EN COURS
function verif_test($titreTest) {
	require('./model/etudiantBD.php');
	return verif_test_available($titreTest);
}
