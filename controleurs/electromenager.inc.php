<?php
ob_end_flush();
include_once('modeles/electromenager.php');
$liens=array(
		"Magasin" => "magasin",
		"Grill Weber" => "grill_weber");
$liens_menu_gauche=recup_liens($liens);
$contenu=recup_contenu($liens);
include_once('vues/electromenager.php');
?>