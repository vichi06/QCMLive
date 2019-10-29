<?php 
// PAGE DE SESSION PROFESSEUR
ob_start(); 
?>

<!DOCTYPE html>
<html>
  <title>Professeur : Session en cours</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./public/css/login.css">
  <!------ Include the above in your HEAD tag ---------->

  <p> Thème : </p>
  <p> Test : <?= $_SESSION['titre'] ?> </p>
  <p> Professeur : <?= strtoupper($_SESSION['profil']['nom'])." ".$_SESSION['profil']['prenom'] ?> </p>
  <p> Groupe : <?= $_SESSION['groupe'] ?></p>
  <p> Bilan : </p>
  <p> questions : </p>
  <?php
    require_once('./model/frontEnd.php');
  	
  	$bdd = dbConnect();
  	
    $sql="SELECT question.titre, question.texte FROM question, test, qcm WHERE test.id_test = qcm.id_test AND qcm.id_quest = question.id_quest";
    
    
    
    try {
      $sth = $bdd->prepare($sql);

      $bool = $sth->execute();

      if ($bool) {
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
      }
    }
    catch (PDOException $e) {
      $msg = utf8_encode("Echec de select : " . $e->getMessage() . "\n");
      die($msg); // On arrête tout.
    }

    var_dump($resultat);
  	
  ?>


</html>

<?php 
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';
	