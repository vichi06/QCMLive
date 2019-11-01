<?php 

// AJOUTE LES ELEMENTS DANS LA TABLE QCM POUR QUE LES ETUDIANTS PUISSENT VOIR LES QUESTIONS
function startTest($titre_test, $theme_test) {

	// VARIABLES SESSIONS 	
	require_once("./model/sessionBD.php");
	$resultat = getDatasFromTestName($titre_test);	
    
    $titreT = htmlentities($titre_test, ENT_QUOTES, "UTF-8"); //permet de protéger tout les caractères spéciaux
    $themeT = htmlentities($theme_test, ENT_QUOTES, "UTF-8"); //permet de protéger tout les caractères spéciaux

	$_SESSION['test']['titre'] = $titreT;
    $_SESSION['test']['theme'] = $themeT;
    $_SESSION['test']['id'] = $resultat['id_test'];
    $_SESSION['test']['idProf'] = $resultat['id_prof'];
    $_SESSION['test']['numGrpe'] = $resultat['num_grpe'];
    $_SESSION['test']['date'] = $resultat['date_test'];
    $_SESSION['test']['bActif'] = $resultat['bActif'];

    // CREER LES QUESTIONS DANS TABLE QCM 
    createQCMs($titre_test);

	$url = "index.php?action=logged&type_utilisateur=".$_SESSION['profil']['typeU']."&controle=test";
    header("Location:" .$url);
}