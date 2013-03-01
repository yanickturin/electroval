<?php
ob_end_flush();
include_once('modeles/references.php');
list($annees_dispo,$derniere_annee)=recup_annees();
if(isset($_GET['sous_menu'])AND $_GET['sous_menu']!=NULL){
	if(is_numeric($_GET['sous_menu'])){
		$annee=mysql_injection($_GET['sous_menu']);
		$references=recup_references($annee);
	}
	else{
		$references=recup_references($derniere_annee);
	}
}
else{
	$references=recup_references($derniere_annee);
}
include_once('vues/references.php');
?>