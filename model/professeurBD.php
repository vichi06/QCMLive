<?php 
	function getTests(){
		require_once('./model/frontEnd.php');
		
		$bdd = dbConnect();
		
		$sql="SELECT titre_test FROM test WHERE id_prof = 1";
		
		$sth = $bdd->prepare($sql);
		$sth->execute();
		
		// SELECT 
		echo "<form action='professeur.php' method='post'>";
		echo "<select id='titre' name='titre'>";
		while($row = $sth->fetch()) {
			echo "<option value='" . $row['titre_test'] . "'>" . $row['titre_test'] ."</option>";
		}
		echo "</select>";
		echo '</form>';	
		//$_POST['titre'];
		return $row['titre_test'];
	}
	
	
	function getGroupe(){
		require_once('./model/frontEnd.php');
		
		$bdd = dbConnect();
		
		$sql="SELECT num_grpe FROM test WHERE titre_test =:titre";
        
        echo $_POST['titre'];

		$sth = $bdd->prepare($sql);
		$sth->bindParam(':titre', $_POST['titre']);
		
		$sth->execute();
		 
		//On récupère les données dans un tableau php
		$donnees = $sth->fetchAll();
		 
		//Affichage du contenu de la variable
		var_dump($donnees);
    }
    
