<?php
session_start();
require('controller/utilisateur.php');

if (isset($_GET['nom']) && isset($_GET['mdp'])){
    ident();
    
    if(isset($_SESSION['session'])){
        
        else {
            echo
        }
    }
}
elseif (isset($_GET['action'])) {
    if ($_GET['action'] == 'login') {
    	require("./view/frontEnd/loginView.php");
    }
    if ($_GET['action'] == 'logged') {
        if ($_GET['type'] == 'eleve') {
            require("./view/frontEnd/tableauDeBord/etudiantView.php");
        }
        if ($_GET['type'] == 'professeur'){
            require("./view/frontEnd/tableauDeBord/professeurView.php");          
        }
    }
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
elseif(empty($_GET['action'])) {
    require("./view/frontEnd/indexView.php");
}


