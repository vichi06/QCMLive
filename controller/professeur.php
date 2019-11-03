<?php 
// FONCTIONS CONCERNANT UN PROFESSEUR

// RETOURNE SESSIONS EN COURS 
function sessionsEnCours($id_prof){
	require_once('./model/getters.php');
	$sessions = getSessionsEnCours($id_prof);
	return $sessions;
}