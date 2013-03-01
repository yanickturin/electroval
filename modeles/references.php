<?php
//--------------------------------------------
// Fonction permettant de récupérer les années disponibles
//--------------------------------------------
function recup_annees(){
	$lien_annees='';
	$tableau_annees = array();
	$sql=requete("SELECT annee FROM reference");
	while ($row = mysql_fetch_array($sql)){
		if(!in_array($row['annee'],$tableau_annees)){
			$tableau_annees[]=$row['annee'];
		}
	}
	rsort($tableau_annees);
	$derniere_annee=$tableau_annees[0];
	if(isset($_GET['sous_menu'])AND $_GET['sous_menu']!=NULL){
		if(is_numeric($_GET['sous_menu'])){
			$annee_demandee=$_GET['sous_menu'];
		}
		else{
			$annee_demandee=$derniere_annee;
		}
	}
	else{
		$annee_demandee=$derniere_annee;
	}
	foreach ($tableau_annees as $val) {
		$actif='';
		if($val==$annee_demandee){
			$actif='class="lien_menu_gauche_actif"';
		}
		$lien_annees.='<li '.$actif.'><a href="references-'.$val.'.html">Année '.$val.'</a></li>';
	}
	return array($lien_annees,$derniere_annee);
}
//--------------------------------------------
// Fonction permettant de récupérer les références d'une année donnée
//--------------------------------------------
function recup_references($annee){
	$references='';
	$sql=requete("SELECT titre, description FROM reference WHERE annee='".$annee."'");
	while($row=mysql_fetch_array($sql)){
		$ref=remplace_bb_code($row['description']);
		$ref=stripslashes($ref);
		$titre='<span class="sous_titre">'.stripslashes($row['titre']).'</span><br /><br />';

		$references.=$titre.$ref.'<br /><br />';
	}
	return $references;
}
?>