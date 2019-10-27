<?php $titre = 'Bienvenue Professeur.'; ?>

<?php ob_start(); 
	require('./model/professeurBD.php');
	?>

<?php if(isset($_SESSION['nom'])) { 
	echo($_SESSION['profil']['nom']); 	
	
} 
?>

<p> Tests en cours : </p>



<?php
	echo($_SESSION['profil']['email']);
	//getTestsActifs();
?>

<?php
	getTests();
	getGroupe();
?>

<button>
	connaître le groupe associé 
</button>

<button>
<a href="./index.php?action=logged&type=professeur&controle=test">
	lancer session
</button>
<?php echo '<a href="deconnexion.php">Deconnection</a>'?>

<?php $contenu = ob_get_clean(); ?>

<?php require './view/frontEnd/template.php'; ?> 
