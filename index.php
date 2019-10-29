<?php
session_start();

require('controller/utilisateur.php');

// CONNEXION A UN TEST PAR L'ETUDIANT
if(isset($_GET['test'])){
    connect_to_session($_GET['test']);
}

// CONNEXION A UN TEST PAR PROFESSEUR
if(isset($_POST['titre']) && isset($_POST['groupe'])){
    $titre = htmlentities($_POST['titre'], ENT_QUOTES, "UTF-8"); //permet de protéger tout les caractères spéciaux
    $groupe = htmlentities($_POST['groupe'], ENT_QUOTES, "UTF-8"); //permet de protéger tout les caractères spéciaux

    $_SESSION['titre'] = $titre;
    $_SESSION['groupe']= $groupe;

    $url = "index.php?action=logged&type_utilisateur=".$_SESSION['profil']['typeU']."&controle=test";
    header("Location:" .$url);
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


