<?php
//--------------------------------------------
//	Author: Conception-Web.ch | François Wagner
//	Description: Pour tester si la personne est admin et non pas un simple utilisateur
//	Date: 20.02.09
//	Version: 1
//--------------------------------------------
//Nom de la table MySQL où se trouve les données membres
$table_membre='users';
//Si la personne est admin, la fonction retourne true
function isAdmin(){
	global $table_membre;
	$login = mysql_injection($_SESSION['login']);
	$sql = requete("SELECT autorisation FROM ".$table_membre." WHERE login = '".$login."'");
	$row = mysql_fetch_row($sql);
	$autorisation = $row[0];
	if($autorisation == "administrator"){
		return true;
	}	
	else{
		return false;
	}
}