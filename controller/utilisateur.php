<?php 
// FONCTIONS CONCERNANT UN UTILISATEUR 

// IDENTIFICATION A LA BASE DE DONNEES
function ident($type) {
	$nom = isset($_GET['nom'])?($_GET['nom']):'';
	$mdp = isset($_GET['mdp'])?($_GET['mdp']):'';

    if  (!verif_ident($nom,$mdp,$type)) {
		$url = "index.php?action=login&type=" .$type;
		header("Location:" .$url) ;	
	}
    else {	
		$_SESSION['profil']['nom'] = $nom;
		$_SESSION['profil']['type'] = $type;
		$url = "index.php?action=logged&type=" .$type;
		header("Location:" .$url);
	}
}

// VERIFICATION IDENTIFICATION
function verif_ident($nom,$mdp,$type) {
	require ('./model/utilisateurBD.php');
	return verif_ident_BD($nom,$mdp,$type); //true ou false en base;
}

// CONNEXION A LA SESSION EN COURS 
function connect_to_session($nomTest) {
	if(!verif_test($nomTest)) {
		$url = "index.php?action=logged&type=etudiant";
		header("Location:" .$url);
	}
	else {
		$_SESSION['test'] = $nomTest;
		$url = "index.php?action=logged&type=eleve&controle=test";
		header("Location:" .$url);
	}
}

// VERIFICATION SESSION EN COURS
function verif_test($nomTest) {
	require('./model/etudiantBD.php');
	return verif_test_available($nomTest);
}
