<?php
ob_end_flush();
include_once('modeles/societe.php');
$liens=array(
		"Situation" => "situation",
		"Historique" => "historique",
		"Domaines d'activités" => "domaines_activites",
		"Organigramme" => "organigramme");
$liens_menu_gauche=recup_liens($liens);
$contenu=recup_contenu($liens);
include_once('vues/societe.php');
?>