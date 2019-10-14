<?php if(isset($_SESSION['nom'])) { $titre = 'Bienvenue ' . $_SESSION['nom']; } ?>

<?php ob_start(); ?>

<?php if(isset($_SESSION['nom'])) { $titre = 'Bienvenue ' . $_SESSION['nom']; } ?>






<?php $contenu = ob_get_clean(); ?>

<?php require './view/frontEnd/template.php'; ?> 