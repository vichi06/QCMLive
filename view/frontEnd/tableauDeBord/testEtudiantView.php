<?php 
// PAGE DE SESSION ETUDIANT
ob_start(); 
?>

<!DOCTYPE html>
<html>
	<title>Etudiant : Session en cours</title>

	<body>
		
		<p> Questions à traiter : </p>
		<!-- AFFICHAGE DES QUESTIONS -->
		<?php
			require_once('./controller/etudiant.php');
			$questionsAffichables = questionsAffichables();
			$nbQuestions = 1;
			foreach ($questionsAffichables as $valeur) {
				// LA QUESTION
				echo "<p>" . $nbQuestions . " : " ;
				if($valeur['bmultiple'] == 1){
					echo " multiple ";
				} 
				echo $valeur['titre'] ." : " . $valeur['texte'] . "</p>";
				$nbQuestions++;

				// LES REPONSES
				require_once('./model/getters.php');
				$reponses = getReponses($valeur['id_quest']);
				foreach ($reponses as $reponse) {
					echo "<p>" . $reponse['texte_rep'] . "</p>";
				}
			}
		?>

	</body>
</html>


<?php
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';


