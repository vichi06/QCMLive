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
		<form action="./index.php" method="post">
			<?php
				require_once('./controller/etudiant.php');
				$questionsAffichables = questionsAffichables();
				$nbQuestions = 1;
				// POUR CHAQUE QUESTION
				foreach ($questionsAffichables as $valeur) {
					// LA QUESTION
					echo "<p>" . $nbQuestions . " : " ;
					$typeReponse = 'radio';
					if($valeur['bmultiple'] == 1){
						echo " multiple ";
						$typeReponse = 'checkbox';
					} 
					echo $valeur['titre'] ." : " . $valeur['texte'] . "</p>";
					$nbQuestions++;

					// LES REPONSES
					require_once('./model/getters.php');
					$reponses = getReponses($valeur['id_quest']);
					foreach ($reponses as $reponse) {
						echo "<p> <input type='" . $typeReponse . "' ";
						echo "name='reponse[]' value='" . $reponse['id_rep'] . "' ";
						require_once('./model/etudiantBD.php');
						if(isAnswered($valeur['id_quest'], $_SESSION['profil']['id'], $_SESSION['test']['id'])) {
							echo " disabled";
						}
						if(isChecked($valeur['id_quest'], $_SESSION['profil']['id'], $_SESSION['test']['id'], $reponse['id_rep'])) {
							echo " checked";
						}
						echo ">";
						echo $reponse['texte_rep'] . "</p>";
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


