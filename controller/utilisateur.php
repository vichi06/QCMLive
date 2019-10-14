<?php 

function ident() {
	$nom= isset($_GET['nom'])?($_GET['nom']):'';
	$mdp= isset($_GET['mdp'])?($_GET['mdp']):'';
	$msg='';
	
	if  (count($_GET)==0){
		$_GET['nom'] = "";
		$_GET['mdp'] = "";
		echo "lol";
		require("./view/frontEnd/loginView.php");
    }
	
    else {
	    if  (!verif_ident($nom,$mdp)) {
			$_GET['nom'] = "";
			$_GET['mdp'] = "";
	        $msg ="erreur de saisie";
			$url = "index.php?action=login";
			header ("Location:" .$url) ;	
		}
	    else { 
			$_SESSION['nom'] = $nom;
			$_GET['nom'] = "";
			$_GET['mdp'] = "";
			$_GET['connecté'] = "etudiant";
			$url = "index.php?action=logged";
			header ("Location:" .$url) ;
		}
		
    }
}

function verif_ident($nom,$mdp) {
	
	require ('./model/utilisateurBD.php');
	return verif_ident_BD($nom,$mdp); //true ou false en base;
}
