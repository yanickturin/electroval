<?php
include_once('modeles/admin_nouvelle_news.php');
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
	$dir='media/';
	if(isset($_GET['edit_news'])AND $_GET['edit_news']!=NULL){
		$id=mysql_injection($_GET['edit_news']);
		list($titre,$texte)=recup_donnees($id);
		$titre=stripslashes($titre);
		$texte=stripslashes(preg_replace("#<br />#",'',$texte));
	}
	list($type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $dir_parent, $dir_parent_fichier)=arborescence_dir($dir);
	$affichage_arbo=affiche_arbo($dir,$type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $dir_parent, $dir_parent_fichier);
	include_once('vues/admin_nouvelle_news.php');
}
?>