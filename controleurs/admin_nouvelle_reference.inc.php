<?php
include_once('modeles/admin_nouvelle_reference.php');
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
	$annee='';
	$dir='media/';
	if(isset($_GET['edit_ref'])AND $_GET['edit_ref']!=NULL){
		$id=mysql_injection($_GET['edit_ref']);
		list($titre,$texte,$annee)=recup_donnees($id);
		$titre=stripslashes($titre);
		$texte=stripslashes(preg_replace("#<br />#",'',$texte));
	}
	list($type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $dir_parent, $dir_parent_fichier)=arborescence_dir($dir);
	$affichage_arbo=affiche_arbo($dir,$type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $dir_parent, $dir_parent_fichier);
	$liste_annee=liste_annee($annee);
	include_once('vues/admin_nouvelle_reference.php');
}
?>