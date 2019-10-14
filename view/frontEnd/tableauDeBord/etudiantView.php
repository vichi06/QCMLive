<?php $titre = 'Bienvenue ' . $_SESSION['nom']; ?>

<?php ob_start(); ?>

<?php echo $_SESSION['nom']; ?>






<?php $contenu = ob_get_clean(); ?>

<?php require './view/frontEnd/template.php'; ?> 