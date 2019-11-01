<?php

// DONNEES CORRESPONDANT A UN TEST
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

function createQCMs($titre_test){
  require_once("./model/sessionBD.php");
  $idTest = getIdTest($titre_test);

  $resultat = getQuestionsFromTheme($_SESSION['test']['theme']);

  require_once('./model/frontEnd.php');
  $bdd = dbConnect();

  while($row = $resultat->fetch()) { 
    try {
      $sql = "INSERT INTO qcm (id_test, id_quest, bAutorise, bBloque, bAnnule) VALUES ('".$_SESSION['test']['id'] . "','" . $row['id_quest'] . "','0', '0', '0')";
      $bdd->exec($sql);   
    }
    catch(PDOException $e){
      echo $sql . "<br>" . $e->getMessage();
    }
  }
}