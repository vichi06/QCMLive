<?php 

// AJOUTE LES ELEMENTS DANS LA TABLE QCM POUR QUE LES ETUDIANTS PUISSENT VOIR LES QUESTIONS
function startTest($titre_test, $theme_test) {

	// VARIABLES SESSIONS 	
	require_once("./model/getters.php");
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
    require_once("./model/sessionBD.php");
    createQCMs($titre_test);

    // RENDRE TEST ACTIF 
    activateTest($_SESSION['test']['id']);

	$url = "index.php?action=logged&type_utilisateur=".$_SESSION['profil']['typeU']."&controle=test";
    header("Location:" .$url);
}

// AUTORISE LA QUESTION A ETRE AFFICHEE LORSQUE LE PROFESSEUR LA COCHE    
function setQuestionsAffichables($questions){
    foreach ($questions as $question) {
        require_once("./model/sessionBD.php");
        $id_quest = getIdQuestion($question);
        updateVisibilityQuestion($id_quest);
    }

    $url = "index.php?action=logged&type_utilisateur=".$_SESSION['profil']['typeU']."&controle=test";
    header("Location:" .$url);
}