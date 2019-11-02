<?php 

// VERIFIER SI TEST/SESSION EN COURS POUR LE TITRE ET GROUPE DONNE
function verif_test_available($nomTest) {
	require('frontEnd.php');
	$bdd = dbConnect();

	$sql = "SELECT id_test, id_prof, num_grpe, titre_test, date_test, bActif FROM test WHERE titre_test=:nomTest AND num_grpe=:numGrpe";

	$resultat = array(); 
	
	try {
		$req = $bdd->prepare($sql);
		$req ->execute(array(':nomTest' => $nomTest, ':numGrpe' => $_SESSION['profil']['num_grpe']));
		$resultat = $req->fetch(PDO::FETCH_ASSOC);

	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}

	if($resultat['bActif'] == 1){
		$_SESSION['test']['titreTest'] = $nomTest;
		$_SESSION['test']['id'] = $resultat['id_test'];
		$_SESSION['test']['idProf'] = $resultat['titre_test'];
		$_SESSION['test']['num_grpe'] = $resultat['prenom'];
		$_SESSION['test']['date'] = $resultat['email'];
		$_SESSION['test']['bActif'] = $resultat['bActif']; 
		return true;
	}
	else {
		return false;
	}
}

function getQuestionsAffichables(){
	require('frontEnd.php');
	$bdd = dbConnect();

	$sql = "SELECT question.titre, question.texte FROM question, qcm WHERE question.id_quest=qcm.id_quest AND qcm.id_test=:id_test AND bAutorise=1";

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