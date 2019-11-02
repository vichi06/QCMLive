<?php 
// PAGE DE SESSION ETUDIANT
ob_start(); 
?>

<!DOCTYPE html>
<html>
	<title>Etudiant : Session en cours</title>

	<body>
		
		<?php
			require_once('./controller/etudiant.php');
			$questionsAffichables = questionsAffichables();
			foreach ($questionsAffichables as $valeur) {
				echo "<p>";
				echo $valeur['titre'];
				echo " : ";
				echo $valeur['texte'];
				echo "</p>";
			}
		?>


	</body>
</html>


<?php
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';


