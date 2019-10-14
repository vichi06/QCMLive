<?php

require('./model/frontEnd.php');

function accueil() {
	$title = "Qcm Live Accueil";

	require("./view/frontEnd/header.php");

	require("./view/frontEnd/indexView.php");

	require("./view/frontEnd/footer.php");
}

function login() {
	$title = "Qcm Live login";

	require("./view/frontEnd/header.php");

	require("./view/frontEnd/loginView.php"	);

	require("./view/frontEnd/footer.php");
}

function etudiant(){
	$title = "Qcm Live Etudiant";

	require("./view/frontEnd/header.php");

	require("./view/frontEnd/tableauDeBord/etudiantView.php");

	require("./view/frontEnd/footer.php");

}

function professeur(){

	$title = "Qcm Live Professeur";
	
	require("./view/frontEnd/header.php");

	require("./view/frontEnd/tableauDeBord/professeurView.php");

	require("./view/frontEnd/footer.php");
}