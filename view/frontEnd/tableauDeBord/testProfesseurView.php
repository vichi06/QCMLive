<?php 
// PAGE DE SESSION PROFESSEUR
ob_start();
require_once('./model/sessionBD.php'); 
require_once('./model/professeurBD.php'); 
?>

<!DOCTYPE html>
<html>
  <title>Professeur : Session en cours</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./public/css/login.css">
  <!------ Include the above in your HEAD tag ---------->

  <!-- CHOIX DU THEME -->
  <!--
  <p> Thème : 
    <form action="./model/professeurBD.php" method="post">
      <select id="" name="">
        <?php 
          $sth = getThemes();
          while($row = $sth->fetch()) {
            echo "<option value='" . $row['titre_theme'] . "'>" . $row['titre_theme'] ."</option>";
          }
        ?>
      </select>
    </form>
  </p>
  -->

  <p> Thème : <?= $_SESSION['test']['theme'] ?> </p>

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
      $resultat = getQuestionsFromTheme($_SESSION['test']['theme']);
      while($row = $resultat->fetch()) {
        echo "<p>";

        if($row['bmultiple'] == 1){
          echo "multiple ";
        }

        echo "<input type='checkbox' name='question[]' id='question' value='". $row['titre'] . "'";
        if(isAffichable($row['id_quest'])){
          echo " checked";
        }
        echo ">-" . $nbQuestion . "-  " . $row['titre'] ." : " . $row['texte'];

        echo "</p>";

        $nbQuestion++;
      }
    ?>

    <input type="submit" value="Lancer Test">
  </form>


  <!-- AFFICHER REPONSES -->
  <p>
    <button onclick="afficherReponses()" value="reponses"> Réponses </button>

    <script>
      function afficherReponses() {
        document.getElementById("demo").innerHTML = "lol";
    </script>

    <p id="demo"> </p>
    <?php
      /*if(isset($_POST['reponses'])) {
        $resultat = getReponses();
        while($row = $resultat->fetch()) {
          echo "<p> <input type='checkbox' value='" . $row['titre'] . "'>". $row['titre'] ." : " . $row['texte'] . "</option> </p>";
      }*/
    ?>
  </p>

</html>

<?php 
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';
