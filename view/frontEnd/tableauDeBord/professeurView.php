<?php 
// PAGE D'ACCUEIL DU PROFESSEUR 
ob_start(); 
require "./model/professeurBD.php"
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Etudiant : Session en cours</title>
	</head>
	
	<body>
		<form action='index.php' method='post'>
			<select id='titre' name='titre'>
			<?php 
				$sth = getTests($_SESSION['profil']['id']);
				while($row = $sth->fetch()) {
					echo "<option value='" . $row['titre_test'] . "'>" . $row['titre_test'] ."</option>";
				}
			?>
			</select>
			<!-- <input type="submit" name="submit" value="get selected values" /> -->
			
			<select id='groupe' name='groupe'>
			<?php 
				$groupes = getGroupes();
				while($row = $groupes->fetch()) {
					echo "<option value='" . $row['num_grpe'] . "'>" . $row['num_grpe'] ."</option>";
				}
			?>
			</select>

			<input type="submit" name="submit" value="Lancer Test">
		</form>





		<?php
			// AVOIR LE GROUPE CORRESPONDANT AU TITRE DU TEST
			/*		
			if(isset($_POST['submit'])) {
				$groupe = getGroupe($_POST['titre']);  // Storing Selected Value In Variable
				echo "Groupe correspondant : " .$groupe;  // Displaying Selected Value
			}
			*/
		?>

		<form>
			<button>
				<a href="./index.php?action=logged&type_utilisateur=professeur&controle=test">
					lancer session
				</a>
			</button>
		</form>

		<a href="./model/deconnexion.php">Deconnection</a>	
	</body>

</html>

<?php
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';
