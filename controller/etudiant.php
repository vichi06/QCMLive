<?php

// CONNEXION A LA SESSION EN COURS 
function connect_to_session($titreTest) {
	if(!verif_test($titreTest)) {
		$url = "index.php?action=logged&type_utilisateur=etudiant";
		header("Location:" .$url);
	}
	else {
		$_SESSION['test'] = $titreTest;
		$url = "index.php?action=logged&type_utilisateur=etudiant&controle=test";
		header("Location:" .$url);
	}
}

// VERIFICATION SESSION EN COURS
function verif_test($titreTest) {
	require('./model/etudiantBD.php');
	return verif_test_available($titreTest);
}

// QUESTIONS AUTORISEES A ETRE AFFICHE PAR LE PROFESSEUR DURANT LE TEST
function questionsAffichables() {
	require('./model/etudiantBD.php');
	return getQuestionsAffichables();
}