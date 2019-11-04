<?php
// FONCTIONS CONCERNANT UN ETUDIANT

// CONNEXION A LA SESSION EN COURS 
// @param : titre du test
function connect_to_session($titreTest) {
	if(!verif_test($titreTest)) {
		$url = "index.php?action=logged&type_utilisateur=etudiant";
		header("Location:" .$url);
	}
	else {
		// VARIABLES SESSION
		require_once("./model/getters.php");
		$resultat = getDatasFromTestName($titreTest);	
	    
	    $titreT = htmlentities($titreTest, ENT_QUOTES, "UTF-8"); //permet de protéger tout les caractères spéciaux

		$_SESSION['test']['titre'] = $titreT;
	    $_SESSION['test']['id'] = $resultat['id_test'];
	    $_SESSION['test']['idProf'] = $resultat['id_prof'];
	    $_SESSION['test']['numGrpe'] = $resultat['num_grpe'];
	    $_SESSION['test']['date'] = $resultat['date_test'];
	    $_SESSION['test']['bActif'] = $resultat['bActif'];

	    // REDIRECTION 
		$url = "index.php?action=logged&type_utilisateur=etudiant&controle=test";
		header("Location:" .$url);
	}
}

// VERIFICATION SESSION EN COURS
// @param : titre du test
function verif_test($titreTest) {
	require('./model/sessionBD.php');
	return verif_test_available($titreTest);
}

// QUESTIONS AUTORISEES A ETRE AFFICHE PAR LE PROFESSEUR DURANT LE TEST
function questionsAffichables() {
	require('./model/etudiantBD.php');
	return getQuestionsAffichables();
}

// ENREGISTRER LES REPONSES DE L'ETUDIANT
// @param : tableau de réponses
function enregistrerReponse($reponses){
	foreach ($reponses as $id_rep) {
		require_once('./model/etudiantBD.php');
		enregistrerReponseBD($id_rep);	
	}

	// REDIRECTION 
	$url = "index.php?action=logged&type_utilisateur=etudiant&controle=test";
	header("Location:" .$url);
}