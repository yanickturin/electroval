<?php
//--------------------------------------------
// Fonction permettant de récupérer les sous-menus à afficher
//--------------------------------------------
function recup_liens($liens){
	$liens_menu_gauche="";
	if(isset($_GET['sous_menu'])){
		$page_demandee=htmlspecialchars($_GET['sous_menu'],ENT_QUOTES);
		foreach($liens as $val) {
			$actif='';
			$titre_lien=array_search($val, $liens);
			if($val==$page_demandee){
				$actif='class="lien_menu_gauche_actif"';
			}
			$liens_menu_gauche.='<li '.$actif.'><a href="electromenager-'.$val.'.html">'.$titre_lien.'</a></li>';
		}
	}
	else{
		$page_demandee="magasin";
		foreach($liens as $val) {
			$actif='';
			$titre_lien=array_search($val, $liens);
			if($val==$page_demandee){
				$actif='class="lien_menu_gauche_actif"';
			}
			$liens_menu_gauche.='<li '.$actif.'><a href="electromenager-'.$val.'.html">'.$titre_lien.'</a></li>';
		}
	}
	$liens_menu_gauche.='<li><a href="bonnes_affaires.html">Bonnes affaires</a></li>';
	return $liens_menu_gauche;
}
//--------------------------------------------
// Fonction permettant de récupérer le contenu de la page
//--------------------------------------------
function recup_contenu($liens){
	if(isset($_GET['sous_menu'])AND $_GET['sous_menu']!=NULL){
		$page_demandee=htmlspecialchars($_GET['sous_menu'],ENT_QUOTES);
		if(!in_array($page_demandee,$liens)){
			$contenu="vues/pages_electromenager/magasin.html";
		}
		else{
			$contenu='vues/pages_electromenager/'.$page_demandee.'.html';
		}
	}
	else{
		$contenu="vues/pages_electromenager/magasin.html";
	}
	return $contenu;
}
?>