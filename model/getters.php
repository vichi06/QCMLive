<?php

// DONNEES CORRESPONDANT A UN TEST : de la base de données
// @param : titre du test
function getDatasFromTestName($titre_test){
  require_once('./model/frontEnd.php');
  $bdd = dbConnect();
  
  $sql="SELECT id_test, id_prof, num_grpe, titre_test, date_test, bActif FROM test WHERE titre_test=:titre_test";
  
  $resultat = array(); 
  
  try {
    $req = $bdd->prepare($sql);
    $req->execute(array(':titre_test' => $titre_test));

    $resultat = $req->fetch(PDO::FETCH_ASSOC);
  }
  catch (PDOException $e) {
    $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    die($msg); // On arrête tout.
  }  

  return $resultat;
}

// THEMES DISPONIBLES
function getThemes(){
	require_once('./model/frontEnd.php');
	$bda = dbConnect();
	
	$sql="SELECT titre_theme FROM theme";
	
	try {
		$sth = $bda->prepare($sql);
		$sth->execute();
		
		return $sth;
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}	
}

// QUESTIONS CORRESPONDANTS A UN TEST
function getQuestions(){
	require_once('./model/frontEnd.php');
	$bdd = dbConnect();
	
  $sql="SELECT question.titre, question.texte FROM question, test, qcm WHERE test.id_test = qcm.id_test AND qcm.id_quest = question.id_quest";
  
  try {
    $sth = $bdd->prepare($sql);

    $bool = $sth->execute();

    if ($bool) {
      //$resultat = $sth->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
      return $sth;
    }
  }
  catch (PDOException $e) {
    $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    die($msg); // On arrête tout.
  }
}

// REPONSES CORRESPONDANTS A UN TEST
function getReponses(){
  require_once('./model/frontEnd.php');
    $bdd = dbConnect();
    
    $sql="SELECT question.titre, question.texte FROM question, test, qcm WHERE test.id_test = qcm.id_test AND qcm.id_quest = question.id_quest";
    
    try {
      $req = $bdd->prepare($sql);

      $bool = $req->execute();

      if ($bool) {
        //$resultat = $req->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
        return $req;
      }
    }
    catch (PDOException $e) {
      $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
      die($msg); // On arrête tout.
    }
}

// ID THEME
function getIdTheme($titre_theme){
  require_once('./model/frontEnd.php');
  $bdd = dbConnect();
  
  $sql = "SELECT id_theme FROM theme WHERE titre_theme =:titre_theme";
  
  try {
    $req = $bdd->prepare($sql);
    $req->execute(array(':titre_theme' => $titre_theme));
    $id_theme = $req->fetch();

    return $id_theme['id_theme'];
  }
  catch (PDOException $e) {
    $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    die($msg); // On arrête tout.
  }
}

// ID THEME
function getIdTest($titre_test){
  require_once('./model/frontEnd.php');
  $bdd = dbConnect();
  
  $sql = "SELECT id_test FROM test WHERE titre_test =:titre_test";
  
  try {
    $req = $bdd->prepare($sql);
    $req->execute(array(':titre_test' => $titre_test));
    $id_test = $req->fetch();

    return $id_test['id_test'];
  }
  catch (PDOException $e) {
    $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    die($msg); // On arrête tout.
  }
}

// TESTS D'UN PROFESSEUR SOUS FORME D'UNE LISTE
function getTests($id_prof){
	require_once('./model/frontEnd.php');
	$bdd = dbConnect();
	
	$sql="SELECT titre_test FROM test WHERE id_prof =:id_prof";
	
	try {
		$sth = $bdd->prepare($sql);
		$sth->execute(array(':id_prof' => $id_prof));
		
		return $sth;
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

// GROUPE CORRESPONDANT A UN TEST
function getGroupe($titre_test){
	require_once('./model/frontEnd.php');
	$bdd = dbConnect();
	
	$sql="SELECT num_grpe FROM test WHERE titre_test=:titre";
    
    try {
		$sth = $bdd->prepare($sql);
		$sth->execute(array(':titre' => $titre_test));
		 
		//On récupère les données dans un tableau php
		$donnees = $sth->fetch(PDO::FETCH_ASSOC);
		
		return $donnees['num_grpe'];
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}



// QUESTIONS CORRESPONDANTS A UN THEME
function getQuestionsFromTheme($titre_theme){

  $id_theme = getIdTheme($titre_theme);

  require_once('./model/frontEnd.php');
  $bdd = dbConnect();
  
  $sql="SELECT id_quest, titre, texte, bmultiple FROM question WHERE id_theme =:id_theme";
  
  try {
    $req = $bdd->prepare($sql);
    $req->execute(array(':id_theme' => $id_theme));
    
    return $req;
  }
  catch (PDOException $e) {
    $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    die($msg); // On arrête tout.
  }
}


  function getIdQuestion($titre_quest){
    require_once('./model/frontEnd.php');
    $bdd = dbConnect();
    
    $sql = "SELECT id_quest FROM question WHERE titre =:titre_quest";
    
    try {
      $req = $bdd->prepare($sql);
      $req->execute(array(':titre_quest' => $titre_quest));
      $id_quest = $req->fetch();

      return $id_quest['id_quest'];
    }
    catch (PDOException $e) {
      $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
      die($msg); // On arrête tout.
    }
  }

  // RETOURNE LES ETUDIANTS CONNECTES : devant faire le test 
  function getConnectedEtudiants($num_grpe){
  	require_once('./model/frontEnd.php');
    $bdd = dbConnect();
    
    $sql = "SELECT genre, nom, prenom FROM etudiant WHERE num_grpe=:numGrpe AND bConnect = 1";
    
    try {
      $req = $bdd->prepare($sql);
      $req->execute(array(':numGrpe' => $num_grpe));
      return $req;
    }
    catch (PDOException $e) {
      $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
      die($msg); // On arrête tout.
    }	
  }
