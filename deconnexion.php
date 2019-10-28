<?php 
session_start();
// SET bConnect A 0
require('./model/frontEnd.php');
$bdd = dbConnect();

try {
	$sql = "UPDATE ".$_SESSION['profil']['typeU']." SET bConnect='0' WHERE nom='".$_SESSION['profil']['nom']."'";
	$stmt = $bdd->prepare($sql);
	$stmt->execute();
	// echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

// DECONNEXION A LA SESSION 
$_SESSION=array();
session_destroy();
session_unset();
header("location:./index.php") ;
