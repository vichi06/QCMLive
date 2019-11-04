<?php 
// PAGE DE SESSION PROFESSEUR
ob_start();
require_once('./model/sessionBD.php'); 
require_once('./model/getters.php'); 
?>

<!DOCTYPE html>
<html>
  <title>Professeur : Session en cours</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./public/css/login.css">
  <!------ Include the above in your HEAD tag ---------->

  <!-- <p> Thème : <?= $_SESSION['test']['theme'] ?> </p> -->

  <!-- DONNEES -->
  <p> Test : <?= $_SESSION['test']['titre'] ?> </p>
  <p> Professeur : <?= strtoupper($_SESSION['profil']['nom'])." ".$_SESSION['profil']['prenom'] ?> </p>
  <p> Groupe : <?= $_SESSION['test']['numGrpe'] ?></p>
  <p> Bilan : Questions </p>
  <p> Questions : </p>
  
  <!-- AFFICHER QUESTIONS SELON LE THEME CHOISI -->
  <form action='./index.php' method='POST'>
    <?php
      $nbQuestion = 1;
      $resultat = getQuestions();
      while($row = $resultat->fetch()) {
        echo "<p>";

        if($row['bmultiple'] == 1){
          echo "multiple ";
        }

        echo "<input type='checkbox' name='question[]' id='question' value='". $row['titre'] . "'";
        if(isAffichable($row['id_quest'], $_SESSION['test']['id'])){
          echo " checked='checked' disabled";
        }
        echo ">-" . $nbQuestion . "-  " . $row['titre'] ." : " . $row['texte'];
        // echo "<input type='submit' name='fin' value='Fin'>";
        echo "</p>";

        $nbQuestion++;
      }
    ?>

    <input type="submit" value="Afficher les Questions">
  </form>

  <!-- LISTE DES ETUDIANTS CONNECTES -->
  <p> Liste des étudiants connectés : </p>
  <?php
    $etudiants = getConnectedEtudiants($_SESSION['test']['numGrpe']);
    foreach ($etudiants as $etudiant) {
      echo "<p> Nom : ". $etudiant['nom'] ." Prenom : " . $etudiant['prenom'];
      require_once('./model/etudiantBD.php');
      echo ", Nombre bonnes réponses : " . numberGoodAnswers($etudiant['id_etu']);
      echo "</p>";
    }
  ?>

  <!-- ARRETER TEST -->
  <form action="./index.php" method="POST">
    <input type="submit" name="stop" value="STOP"> 
  </form>

  <!-- CARNET DE BORD -->
  <a href="./index.php?action=logged&type_utilisateur=professeur"> Carnet de Bord </a>
</html>

<?php 
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';
