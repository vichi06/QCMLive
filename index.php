<?php

session_start();

require('controller/utilisateur.php');

// CONNEXION A UN TEST PAR L'ELEVE
if(isset($_GET['test'])){
    connect_to_session($_GET['test']);
}

// IDENTIFICATION SINON NAVIGUE DANS ZONES NON IDENTIFIER
if (isset($_GET['nom']) && isset($_GET['mdp'])){
    ident($_GET['type']);
}
elseif (isset($_GET['action'])) {
    // LOGIN
    if ($_GET['action'] == 'login') {
    	require("./view/frontEnd/loginView.php");
    }
    // ZONE UTILISATEUR CONNECTER
    if ($_GET['action'] == 'logged') {
        if ($_GET['type'] == 'eleve') {
            if(isset($_GET['controle'])){
                require("./view/frontEnd/tableauDeBord/testEtudiantView.php"); 
            }
            else {
                require("./view/frontEnd/tableauDeBord/etudiantView.php");         
            }}
        if ($_GET['type'] == 'professeur'){
            if(isset($_GET['controle'])){
                require("./view/frontEnd/tableauDeBord/testProfView.php"); 
            }
            else {
                require("./view/frontEnd/tableauDeBord/professeurView.php");         
            }            
        }
    }

    // PAGES AUTRES
	if ($_GET['action'] == 'utilisation') {
    	require("./view/frontEnd/utilisationView.php");
    }
	if ($_GET['action'] == 'developpeurs') {
    	require("./view/frontEnd/developpeursView.php");
    }
	if ($_GET['action'] == 'register') {
    	require("./view/frontEnd/registerView.php");
    }
}
// ACCUEIL
elseif(empty($_GET['action']) && empty($_GET['test'])) {
    require("./view/frontEnd/indexView.php");
}


