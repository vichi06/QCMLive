<?php

function dbConnect(){
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=pweb19_nguyenva;charset=utf8', 'pweb19_nguyenva', 'x10022000');
		//$bdd = new PDO('mysql:host=localhost;dbname=projetpweb;charset=utf8', 'root', '');
		return $bdd;
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
}

function getStudents(){
	$bdd = dbConnect();
	$reponse = $bdd->query('SELECT * FROM etudiant');
	
	echo '<p>Voici les élèves :</p>';
	while ($donnees = $reponse->fetch())
	{
		echo $donnees['nom'] . '<br />';
	}

	$reponse->closeCursor();
}

function getQuestions(){
	$bdd = dbConnect();
	$reponse = $bdd->query('SELECT * FROM question');
	
	echo '<p>Voici les questions :</p>';
	while ($donnees = $reponse->fetch())
	{
		echo $donnees['texte'] . '<br />';
	}

	$reponse->closeCursor();
}

/*
function getProfesseurs(){
	$bdd = dbConnect();
	$reponse = $bdd->query('SELECT * FROM professeur');
	
	echo '<p>Voici les élèves :</p>';
	while ($donnees = $reponse->fetch())
	{
		echo $donnees['nom'] . '<br />';
	}

	$reponse->closeCursor();
}
*/