<?php 
// PAGE D'ACCUEIL DU PROFESSEUR 
ob_start(); 
require "./model/professeurBD.php"
?>

<!DOCTYPE html>
<html>
	<title>Etudiant : Session en cours</title>

	<p> Tests en cours : </p>

	<?php
		echo($_SESSION['profil']['email']);
		//getTestsActifs();

		getTests();
		getGroupe();
	?>

	<button>
		Connaître le groupe associé 
	</button>

	<form>
		<button>
			<a href="./index.php?action=logged&type_utilisateur=professeur&controle=test">
				lancer session
			</a>
		</button>
	</form>

	<a href="deconnexion.php">Deconnection</a>'
</html>

<?php
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';
