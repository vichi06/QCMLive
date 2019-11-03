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
		<form>
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
						echo "<p> <input type=checkbox name='reponse' value='" . $reponse['texte_rep'] . "'>" . $reponse['texte_rep'] . "</p>";
					}
					echo "<input type=submit name='submit'>";
				}
			?>
		</form>
	</body>
</html>


<?php
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';


