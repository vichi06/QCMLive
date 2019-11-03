<?php 
// PAGE D'ACCUEIL DU PROFESSEUR 
ob_start(); 
require "./model/getters.php"
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tableau de Bord</title>
	</head>
	
	<body>

		<p> 
			Vos sessions en cours :
			<?php
				$sessions = getSessionsEnCours($_SESSION['profil']['id']);
				while($row = $sessions->fetch()) {
					echo '<p> Nom du test : ' . $row['titre_test'] . ", du groupe " . $row['num_grpe'];
					echo "<form action='./index.php' method='POST'> 
							<input type='text' name='titre_test' value='" . $row['titre_test'] . "'>
							<input type='submit' name='continuer' value='continuer'>";
					echo "</form>";
					echo "</p>";
				}		
			?>
		</p>



		<form action='index.php' method='post'>
			<p> Sélectionner un titre de test :
				<select id='titreTest' name='titreTest'>
					<?php 
						$sth = getTestsAvailable($_SESSION['profil']['id']);
						while($row = $sth->fetch()) {
							echo "<option value='" . $row['titre_test'] . "'>" . $row['titre_test'] ."</option>";
						}
					?>
				</select>
			</p>
			<!--
			<p> Sélectionner un theme :
				<select id='themeTest' name='themeTest'>
					<?php 
						$sth = getThemes();
						while($row = $sth->fetch()) {
							echo "<option value='" . $row['titre_theme'] . "'>" . $row['titre_theme'] ."</option>";
						}
					?>
				</select>
			</p>
			-->

			<input type="submit" name="submit" value="Lancer Test">
		</form>

		<a href="./model/finSession.php">Deconnection</a>	
	</body>

</html>

<?php
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';
