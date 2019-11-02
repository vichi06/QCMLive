<?php 
// PAGE DE SESSION ETUDIANT
ob_start(); 
?>

<!DOCTYPE html>
<html>
	<title>Etudiant : Session en cours</title>

	<body>
		
		<!-- AFFICHAGE DES QUESTIONS -->
		<?php
			require_once('./controller/etudiant.php');
			$questionsAffichables = questionsAffichables();
			foreach ($questionsAffichables as $valeur) {
				echo "<p>" . $valeur['titre'] ." : " . $valeur['texte'] . "</p>";
			}
		?>
		
	</body>
</html>


<?php
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';


