<?php 
// PAGE DE SESSION ETUDIANT
ob_start(); 
?>

<!DOCTYPE html>
<html>
	<title>Etudiant : Session en cours</title>
</html>


<?php
$contenu = ob_get_clean(); 
require './view/frontEnd/template.php';


