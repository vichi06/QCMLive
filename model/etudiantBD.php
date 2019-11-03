<?php 

// RETOURNE LES QUESTIONS AFFICHABLES : selon la décision du professeur
function getQuestionsAffichables(){
	require('frontEnd.php');
	$bdd = dbConnect();

	$sql = "SELECT question.id_quest, question.titre, question.texte, question.bmultiple FROM question, qcm WHERE question.id_quest=qcm.id_quest AND qcm.id_test=:id_test AND bAutorise=1";

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

function enregistrerReponseBD($id_rep) {
	require_once('./model/getters.php');
	$reponse = getDatasFromIdReponse($id_rep);

	require_once('frontEnd.php');
	$bdd = dbConnect();

	$sql = "INSERT INTO resultat (id_test, id_etu, id_quest, date_res, id_rep) 
		VALUES ('" . $_SESSION['test']['id'] . "', '" . $_SESSION['profil']['id'] . "', '" . $reponse['id_quest'] ."', CAST(NOW() AS DATE), '" . $reponse['id_rep'] ."')";

	try {
		$req = $bdd->prepare($sql);
		$req ->execute();		
	} 
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function isAnswered($id_quest, $id_etu, $id_test) {
	require_once('frontEnd.php');
	$bdd = dbConnect();

	$sql = "SELECT * FROM resultat WHERE id_quest=:idQ AND id_etu=:idE AND id_test=:idT";

	try {
		$req = $bdd->prepare($sql);
		$req ->execute(array(':idQ' => $id_quest, ':idE' => $id_etu, ':idT' => $id_test));
		if(!empty($req->rowCount())){
			return true;
		}
		else {
			return false;
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}	
}

function isChecked($id_quest, $id_etu, $id_test, $id_rep) {
	require_once('frontEnd.php');
	$bdd = dbConnect();

	$sql = "SELECT * FROM resultat WHERE id_quest=:idQ AND id_etu=:idE AND id_test=:idT AND id_rep=:idR";

	try {
		$req = $bdd->prepare($sql);
		$req->execute(array(':idQ' => $id_quest, ':idE' => $id_etu, ':idT' => $id_test, ':idR' => $id_rep));
		if(!empty($req->rowCount())){
			return true;
		}
		else {
			return false;
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function numberGoodAnswers($id_etu){
	require_once('frontEnd.php');
	$bdd = dbConnect();

	$sql = "SELECT bvalide FROM resultat, reponse WHERE id_etu=:idE AND resultat.id_rep = reponse.id_rep";

	$nbGoodAnswers = 0;

	try {
		$req = $bdd->prepare($sql);
		$req->execute(array(':idE' => $id_etu));
		foreach ($req as $reponse) {
			if($reponse['bvalide'] == 1){
				$nbGoodAnswers++;
			}
		}

		return $nbGoodAnswers;
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}	
}
