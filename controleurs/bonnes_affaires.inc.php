<?php
ob_end_flush();
include_once('modeles/bonnes_affaires.php');
$liens_menu_gauche = recup_liens();
$contenu = recup_contenu();
include_once('vues/bonnes_affaires.php');
?>