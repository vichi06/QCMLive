<?php $titre = 'Bienvenue étudiant !'; 

ob_start(); 

 if(isset($_SESSION['nom'])) {
     $titre = 'Bienvenue ' . $_SESSION['nom']; } 
    echo $titre;


    require "./model/frontEnd.php";
    $bdd = dbConnect();
    



    $contenu = ob_get_clean(); 

 require './view/frontEnd/template.php'; 