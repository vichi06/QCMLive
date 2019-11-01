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
			<p> Sélectionner un titre de test :
				<select id='titreTest' name='titreTest'>
					<?php 
						$sth = getTests($_SESSION['profil']['id']);
						while($row = $sth->fetch()) {
							echo "<option value='" . $row['titre_test'] . "'>" . $row['titre_test'] ."</option>";
						}
					?>
				</select>
			</p>
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

			<input type="submit" name="submit" value="Lancer Test">
		</form>

		<a href="./model/finSession.php">Deconnection</a>	
	</body>

</html>

<?php
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';
