<?php
include_once('modeles/interne.php');
if(!connecte()){
	header('Location:'.ADRESSE_SITE.'/connexion_interne.html');
}
else{
	ob_end_flush();
	$contenu = recup_contenu();
	include_once('vues/interne.php');
}
?>