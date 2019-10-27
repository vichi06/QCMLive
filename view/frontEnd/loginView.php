<?php 
// PAGE D'IDENTIFICATION 
ob_start(); 
?>

<!DOCTYPE html>
<html>
  <title>Identification</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./public/css/login.css">
  <!------ Include the above in your HEAD tag ---------->

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <h1>  </h1>
      </div>

      <!-- Login Form -->
      <form action="./index.php?" method="get">
        <input type="text" id="login" class="fadeIn second" name="nom" placeholder="identifiant">
        <input type="password" id="password" class="fadeIn third" name="mdp" placeholder="mot de passe">
       <!-- <select name="type" id="">
          <option value="professeur" <?php if($_GET['type'] == 'professeur') echo "selected";?> >Professeur</option>
          <option value="etudiant" <?php if($_GET['type'] == 'etudiant') echo "selected";?>>etudiant</option>
        </select> -->
        <input type = "text" name="type" value="<?php echo $_GET['type']; ?>">
        <input type="submit" class="fadeIn fourth" value="Se connecter">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Mot de passe oublié?</a>
      </div>

    </div> 
  </div>

</html>

<?php
$contenu = ob_get_clean(); 
require 'template.php';
	