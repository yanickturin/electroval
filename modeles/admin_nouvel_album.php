<?php
/////////////////////////////////////////////////////////////////////////////////////////////
// Explorer le répertoire media
/////////////////////////////////////////////////////////////////////////////////////////////
$type=array();
$adresse=array();
$nom=array();
$type_fichier=array();
$adresse_fichier=array();
$nom_fichier=array();
$dir_parent=array();
$dir_parent_fichier=array();
$affichage_arbo='';
$k = 0;
function arborescence_dir($dir){
	global $type,$adresse,$nom,$type_fichier,$adresse_fichier,$nom_fichier,$dir_parent,$dir_parent_fichier;
	$open_dir=opendir($dir);
	while(($file = readdir($open_dir)) !== false) {
		if($file!='.' && $file!='..'){
			if(is_dir($dir.'/'.$file)){
				$type[]='dossier';
				$adresse[]=$dir.$file.'/';
				$nom[]=$file;
				$dir_parent[]=$dir;
				arborescence_dir($dir.$file.'/');
			}
			else{
				//if(mime_content_type($dir.$file)=='image/jpeg'){
					$type_fichier[]='image';
					$adresse_fichier[]= $dir.$file;
					$nom_fichier[]=$file;
					$dir_parent_fichier[]=$dir;
				//}
			}
		}
	}
	closedir($open_dir);
	return array($type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $dir_parent, $dir_parent_fichier);
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Afficher l'explorer du répertoire média
/////////////////////////////////////////////////////////////////////////////////////////////
function affiche_arbo($dir,$type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $dir_parent, $dir_parent_fichier){
	global $affichage_arbo,$k;
	$nombre_dossiers=count($type);
	$nombre_fichiers=count($type_fichier);
	for($i=0;$i<$nombre_dossiers;$i++){
		if($dir_parent[$i]==$dir){
			$affichage_arbo.='<div class="arbo_dossier">
									<a href="javascript:deplie(\'arbo_fichier_'.$nom[$i].$k.'\')">
									<img src="vues/images/icones/'.$type[$i].'.png" alt="" class="vertical_align" />'.$nom[$i].'</a>
									<div id="arbo_fichier_'.$nom[$i].$k.'" class="arbo_cache">';
			$dir_new=$dir.$nom[$i].'/';
			$k++;
			affiche_arbo($dir_new,$type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $dir_parent, $dir_parent_fichier);
			$affichage_arbo.='</div></div>';
		}
	}
	for($i=0;$i<$nombre_fichiers;$i++){
		if($dir_parent_fichier[$i]==$dir){
			list($hauteur_min, $largeur_min)=TailleMiniature($adresse_fichier[$i], 150);
			$affichage_arbo.='<div class="arbo">
								<span class="info"><img src="vues/images/icones/'.$type_fichier[$i].'.png" alt="" class="vertical_align" /><span><img src="'.ADRESSE_SITE.'/'.$adresse_fichier[$i].'" width="'.$largeur_min.'" height="'.$hauteur_min.'" alt="" /></span></span><a href="javascript:bb_code_image(\'texte\',\''.ADRESSE_SITE.'/'.$adresse_fichier[$i].'\',\'affiche_images\')">'.$nom_fichier[$i].'</a><br />';
			$affichage_arbo.='</div>';
		}
	}
	return $affichage_arbo;
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Explorer le répertoire media, seulement les répertoires
/////////////////////////////////////////////////////////////////////////////////////////////
$type1=array();
$adresse1=array();
$nom1=array();
$type_fichier1=array();
$dir_parent1=array();
$affichage_arboOnlyDir='';
function arborescenceDirOnly($dir){
	global $type1,$adresse1,$nom1,$type_fichier1,$dir_parent1;
	$open_dir=opendir($dir);
	while(($file = readdir($open_dir)) !== false) {
		if($file!='.' && $file!='..'){
			if(is_dir($dir.'/'.$file)){
				$type1[]='dossier';
				$adresse1[]=$dir.$file.'/';
				$nom1[]=$file;
				$dir_parent1[]=$dir;
				arborescenceDirOnly($dir.$file.'/');
			}
		}
	}
	closedir($open_dir);
	return array($type1,$adresse1,$nom1, $type_fichier1,$dir_parent1);
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Afficher l'explorer du répertoire média
/////////////////////////////////////////////////////////////////////////////////////////////
function affiche_arboOnlyDir($dir,$type1,$adresse1,$nom1, $type_fichier1,$dir_parent1){
	global $affichage_arboOnlyDir,$k;
	$nombre_dossiers=count($type1);
	for($i=0;$i<$nombre_dossiers;$i++){
		if($dir_parent1[$i]==$dir){
			$affichage_arboOnlyDir.='<div class="arbo_dossier">
									<a href="javascript:deplie(\'arbo_fichier_'.$nom1[$i].$k.'\')">
									<img src="vues/images/icones/'.$type1[$i].'.png" alt="" class="vertical_align"  />'.$nom1[$i].'</a>
									<a href="javascript:addDir(\'dossier\',\''.$adresse1[$i].'\',\'affiche_dossiers\');">
									<img src="vues/images/icones/add.png" alt="" class="vertical_align" /></a>
									<div id="arbo_fichier_'.$nom1[$i].$k.'" class="arbo_cache">';
			$dir_new=$dir.$nom1[$i].'/';
			$k++;
			affiche_arboOnlyDir($dir_new,$type1,$adresse1,$nom1, $type_fichier1,$dir_parent1);
			$affichage_arboOnlyDir.='</div></div>';
		}
	}
	return $affichage_arboOnlyDir;
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Récupérer les différents champs d'une news
/////////////////////////////////////////////////////////////////////////////////////////////
function recup_donnees($id){
	$sql=requete("SELECT titre, description, dossier FROM galerie WHERE id='".$id."'");
	$row = mysql_fetch_row($sql);
	$titre=stripslashes($row[0]);
	$texte=stripslashes(preg_replace("#<br />#",'',$row[1]));
	$dossier=stripslashes($row[2]);
	return array($titre,$texte,$dossier);
}
?>