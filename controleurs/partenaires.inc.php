<?php
ob_end_flush();
include_once('modeles/partenaires.php');
$liens=array(
		"Electroménager" => "electromenager",
		"Lustrerie" => "lustrerie",
		"Matériel électrique" => "materiel_electrique",
		"Télécom" => "telecom",
		"Grill" => "grill",
		"Association" => "association");
$liens_menu_gauche=recup_liens($liens);
$contenu=recup_contenu($liens);
include_once('vues/partenaires.php');
?>