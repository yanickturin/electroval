<?php
ob_end_flush();
include_once('modeles/partenaires.php');
$liens=array(
		"Electrom�nager" => "electromenager",
		"Lustrerie" => "lustrerie",
		"Mat�riel �lectrique" => "materiel_electrique",
		"T�l�com" => "telecom",
		"Grill" => "grill",
		"Association" => "association");
$liens_menu_gauche=recup_liens($liens);
$contenu=recup_contenu($liens);
include_once('vues/partenaires.php');
?>