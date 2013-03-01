<?php
include_once('modeles/admin_nouvel_album.php');
if(!connecte()){
	header('Location:'.ADRESSE_SITE.'/connexion.html');
}
elseif(!isAdmin()){
	header('Location:'.ADRESSE_SITE.'/connexion.html');
}
else{
	ob_end_flush();
	$id = '';
	$titre = '';
	$texte = '';
	$dossier = '';
	$dir='media/';
	$dirGalerie='media/galerie_photos/';
	if(isset($_GET['edit_album'])AND $_GET['edit_album']!=NULL){
		$id=mysql_injection($_GET['edit_album']);
		list($titre,$texte,$dossier)=recup_donnees($id);
		$titre=stripslashes($titre);
		$texte=stripslashes(preg_replace("#<br />#",'',$texte));
		$dossier=stripslashes($dossier);
	}
	//Arborescence complète
	list($type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $dir_parent, $dir_parent_fichier)=arborescence_dir($dir);
	$affichage_arbo=affiche_arbo($dir,$type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $dir_parent, $dir_parent_fichier);
	//Arborescence des répertoires
	list($type1,$adresse1,$nom1, $type_fichier1, $dir_parent1)=arborescenceDirOnly($dirGalerie);
	$affichage_arboOnlyDir=affiche_arboOnlyDir($dirGalerie,$type1,$adresse1,$nom1, $type_fichier1, $dir_parent1);
	include_once('vues/admin_nouvel_album.php');
}
?>