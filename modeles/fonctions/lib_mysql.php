<?php
//--------------------------------------------
//	Author: Conception-Web.ch | Fran�ois Wagner
//	Description: librairie MySQL
//	Date: 22.05.08
//	Version: 1
//--------------------------------------------

// Fonction pour les requ�tes
//La fonction sert � faire une requ�te MySQL
//La function prend en argument la requ�te
function requete($sql){
	data_base_connect();
	$requete=mysql_query($sql)or die('Requ�te invalide : ' . mysql_error() . '\n');
	$close_db=mysql_close()or die('Requ�te invalide : ' . mysql_error() . '\n');
	return $requete;
}
//Fonction pour la connexion � la base
function data_base_connect(){
	$connect=mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD)or die('Requ�te invalide : ' . mysql_error() . '\n');
	$select_db=mysql_select_db(MYSQL_DATA_BASE)or die('Requ�te invalide : ' . mysql_error() . '\n');
}
//Fonction mysql_real_escape_string
function mysql_injection($data){
	data_base_connect();
	$protection_db=mysql_real_escape_string($data);
	$close_db=mysql_close()or die('Requ�te invalide : ' . mysql_error() . '\n');
	return $protection_db;
}