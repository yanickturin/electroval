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
		if($file!='.' && $file!='..' && $file != 'galerie_photos'){
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
// Créer une liste des années
/////////////////////////////////////////////////////////////////////////////////////////////
function liste_categorie($categorie){
	$liste_categorie = '';
	$sql=requete("SELECT nom FROM categorie");
	$liste_categorie.='
			<select name="categorie">';
	while($row=mysql_fetch_array($sql)){
		$liste_categorie.='<option value="'.$row['nom'].'" '.choixpardefaut($row['nom'],$categorie).'>'.$row['nom'].'</option>';
	}
	$liste_categorie.='</select>';
	return $liste_categorie;
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Checker le choix d'une liste déroulante
/////////////////////////////////////////////////////////////////////////////////////////////
function choixpardefaut($selected, $value){// Création de la fonction
	$par_defaut = ''; // On crée une variable (vide par défaut) que l'on retournera à la fin
        if ($value == $selected){ // Si cette couleur correspond à la couleur que l'on est en train de traiter
            $par_defaut='selected="selected"'; // Alors on modifie la variable que l'on retournera et on lui met selected
        }
	return $par_defaut; // On ne retourne rien si ce n'était pas la couleur choisie, selected si c'était la bonne couleur
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Récupérer les différents champs d'une référence
/////////////////////////////////////////////////////////////////////////////////////////////
function recup_donnees($id){
	$sql=requete("SELECT titre, description, categorie FROM bonnes_affaires WHERE id='".$id."'");
	$row = mysql_fetch_row($sql);
	$titre=stripslashes($row[0]);
	$texte=stripslashes(preg_replace("#<br />#",'',$row[1]));
	$categorie=stripslashes($row[2]);
	return array($titre,$texte,$categorie);
}
?>