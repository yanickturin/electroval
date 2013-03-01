<?php
include_once('modeles/admin_images.php');
if(!connecte()){
	header('Location:'.ADRESSE_SITE.'/connexion.html');
}
elseif(!isAdmin()){
	header('Location:'.ADRESSE_SITE.'/connexion.html');
}
else{
	ob_end_flush();
	$dir="media/";
	$message_admin='';
	if(isset($_POST['id_modif']) AND $_POST['id_modif']!=NULL){
		$message_admin = modification_image();
	}
	if(isset($_POST['dir']) AND isset($_FILES['image']) AND $_POST['dir']!=NULL AND $_FILES['image']!=NULL){
		$message_admin = ajout_image();
	}
	if(isset($_POST['dir']) AND isset($_FILES['zip']) AND $_POST['dir']!=NULL AND $_FILES['zip']!=NULL){
		$message_admin = ajout_zip();
	}
	if(isset($_POST['dir']) AND isset($_POST['dossier']) AND $_POST['dir']!=NULL AND $_POST['dossier']!=NULL){
		$message_admin = ajout_dossier();
	}
	if(isset($_GET['supprimer_f'])AND $_GET['supprimer_f']!=NULL){
		$message_admin = supprimer_fichier();
	}
	if(isset($_GET['supprimer_d'])AND $_GET['supprimer_d']!=NULL){
		$message_admin = supprimer_dossier();
	}
	if(isset($_GET['repertoire'])AND $_GET['repertoire']!=NULL){
		$dir=htmlspecialchars($_GET['repertoire']);
		list($type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $poids_fichier, $hauteur, $largeur, $hauteur_miniature, $largeur_miniature) = explore_dir($dir);
	}
	else{
		list($type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $poids_fichier, $hauteur, $largeur, $hauteur_miniature, $largeur_miniature) = explore_dir($dir);
	}
	$dir_precedent_tab=explode("/",$dir);
	if(count($dir_precedent_tab)>2){
		$nb=count($dir_precedent_tab);
		unset($dir_precedent_tab[$nb-2]);
	}
	$dir_precedent=implode("/",$dir_precedent_tab);
	$dir_precedent='index.php?page=admin_images&amp;repertoire='.$dir_precedent;
	$nombre_entrees_dossier=count($type);
	$nombre_entrees_fichier=count($type_fichier);
	include_once('vues/admin_images.php');
}
?>