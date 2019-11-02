<?php 

// RETOURNE LES QUESTIONS AFFICHABLES : selon la décision du professeur
function getQuestionsAffichables(){
	require('frontEnd.php');
	$bdd = dbConnect();

	$sql = "SELECT question.id_quest, question.titre, question.texte, question.bmultiple FROM question, qcm WHERE question.id_quest=qcm.id_quest AND qcm.id_test=:id_test AND bAutorise=1";

	$resultat = array(); 
	
	try {
		$req = $bdd->prepare($sql);
		$req ->execute(array(':id_test' => $_SESSION['test']['id']));
		return $req;
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}