<?php $titre = 'Bienvenue étudiant !';  
ob_start(); 

if(isset($_SESSION['nom'])) {
    $titre = 'Bienvenue ' . $_SESSION['nom']; } 
   echo $titre;
