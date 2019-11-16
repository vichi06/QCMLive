<?php 
// PAGE BILAN
ob_start(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title> BILAN </title>
	</head>

	<body>
		
		Session : <?= $_SESSION['test']['titre'] ?> 

		<button> Exporter </button>

		<a href='./index.php?action=continueTest'> Retour Test </a> 

		Etudiants :

		Notes :

		Finale/20

		Q1

		Q3

		Moy/20 (2 questions) : 

		Professeur : <?= $_SESSION['profil']['nom'] ?> 

		Grpe : (nb eleves) <?= $_SESSION['test']['numGrpe'] ?>

	</body>
</html>

<?php 
$contenu = ob_get_clean(); 
require 'template.php'; 