<?php 
// DECONNEXION A LA SESSION 
session_start();
$_SESSION=array();
session_destroy();
session_unset();
header("location:./index.php") ;
