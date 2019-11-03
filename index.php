<?php
session_start();
require('controller/etudiant.php');
require('controller/professeur.php');
require('controller/utilisateur.php');
require('controller/session.php');

// QUESTIONS A AFFICHER PAR PROFESSEUR
if(isset($_POST['question'])){
    setQuestionsAffichables($_POST['question']);
}

// CONTINUER UN TEST 
if(isset($_POST['continuer'])){
    continueTest($_POST['titre_test']);
}

// QUESTIONS A AFFICHER PAR PROFESSEUR
if(isset($_POST['stop'])){
    stopTest($_SESSION['test']['id']);
}

// CONNEXION A UN TEST PAR L'ETUDIANT
if(isset($_GET['test'])){
    connect_to_session($_GET['test']);
}

// DEMARRAGE D'UN TEST PAR PROFESSEUR
if(isset($_POST['titreTest'])){
    startTest($_POST['titreTest']/*, $_POST['themeTest']*/);
}

// IDENTIFICATION SINON NAVIGUE DANS ZONES NON IDENTIFIER
if (isset($_GET['login_utilisateur']) && isset($_GET['pass_utilisateur'])){
    ident();
}
elseif (isset($_GET['action'])) {
    // LOGIN
    if ($_GET['action'] == 'login') {
    	require("./view/frontEnd/loginView.php");  
    }
    // ZONE UTILISATEUR CONNECTER
    if ($_GET['action'] == 'logged') {
        if ($_GET['type_utilisateur'] == 'etudiant') {
            if(isset($_GET['controle'])){
                require("./view/frontEnd/tableauDeBord/testEtudiantView.php"); 
            }
            else {
                require("./view/frontEnd/tableauDeBord/etudiantView.php");         
            }}
        if ($_GET['type_utilisateur'] == 'professeur'){
            if(isset($_GET['controle'])){
                require("./view/frontEnd/tableauDeBord/testProfesseurView.php"); 
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


