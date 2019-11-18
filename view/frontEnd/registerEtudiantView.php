<?php 
// PAGE D'IDENTIFICATION 
ob_start(); 
?>

<!DOCTYPE html>
<html>
<head>
  <title> Identifies-toi bonhomme</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <!-- SCRIPTS -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./public/css/login.css">
</head>
<!------ Include the above in your HEAD tag ---------->

<body>
  <div class="wrapper fadeInDown"style="background-color: #5c94bd;">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <h1>  </h1>
      </div>

      <!-- Login Form -->
      <form action="./index.php?action=ident" method="post">
        <p class="h4 mb-4 underlineHover"style="font-family:'Noto Sans',sans-serif;">QCM Live</p>
        <input type="text" id="nom" class="fadeIn second" name="nom_utilisateur" placeholder="Nom"required>
        <input type="text" id="prenom" class="fadeIn second" name="prenom_utilisateur" placeholder="Prénom"required>
        <input type="text" id="mail" class="fadeIn second" name="mail_utilisateur" placeholder="Adresse mail"required>
        <input type="text" id="login" class="fadeIn second" name="login_utilisateur" placeholder="Identifiant"required>
        <input type="password" id="password" class="fadeIn third" name="pass_utilisateur" placeholder="Mot de passe"required>
        <input type = "text" name="type_utilisateur" value="<?php echo $_GET['type_utilisateur']; ?>"placeholder="professeur ou etudiant"required>
        <input type="submit" class="fadeIn fourth" value="S'inscrire">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Vous avez déjà un compte ? Connectez-vous !</a><br>
        <a href="./index.php?action=login&type_utilisateur=professeur">
          <button type="button"   class="btn btn-dark btn-lg download-button">
            <i class="fas fa-chalkboard-teacher"></i> Professeur
          </button>
        </a>

        <a href="./index.php?action=login&type_utilisateur=etudiant">
          <button type="button" class="btn btn-light btn-lg download-button">
            <i class="fas fa-user-graduate"></i> Etudiant
          </button>
        </a>
        
      </div>

    </div> 
  </div>
  <hr>
</body>

</html>

<?php
$contenu = ob_get_clean(); 
require 'template.php';