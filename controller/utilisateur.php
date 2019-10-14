<?php 

function ident() {
	$nom= isset($_GET['nom'])?($_GET['nom']):'';
	$mdp= isset($_GET['mdp'])?($_GET['mdp']):'';
	$msg='';

    if  (!verif_ident($nom,$mdp)) {
        //$msg ="erreur de saisie";
		$url = "index.php?action=login";
		header ("Location:" .$url) ;	
	}
    else {
    	session_start(); 	
		$_SESSION['nom'] = $_GET['nom'];
		$url = "index.php?action=logged&type=" .$_GET['type'];
		header ("Location:" .$url);
	}
}

function verif_ident($nom,$mdp) {
	require ('./model/utilisateurBD.php');
	return verif_ident_BD($nom,$mdp); //true ou false en base;
}
