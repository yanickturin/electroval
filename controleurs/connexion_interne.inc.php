<?php
$message_connexion='';
$is_connecte=0;
$table_membre='users';
include_once('modeles/connexion_interne.php');
if(check_connexion()){
	header('Location:'.ADRESSE_SITE.'/interne.html');
	?>
	<noscript><p class="erreur">Votre navigateur ne supporte pas le javascript, veuillez faire une mise à jour de celui-ci, ou activez le javascript.</noscript>
	<?php
}
else{
	ob_end_flush();
	include_once('vues/connexion_interne.php');
}
?>