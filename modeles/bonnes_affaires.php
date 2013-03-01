<?php
function recup_liens(){
	$sql = requete("SELECT * FROM categorie");
	$liens = '';
	if(isset($_GET['sous_menu'])AND $_GET['sous_menu']!=NULL){
		$sous_menu = htmlentities(utf8_decode($_GET['sous_menu']),ENT_QUOTES);
		while ($row = mysql_fetch_array($sql)){
			$actif='';
			if($row['nom'] == $sous_menu){
				$actif='class="lien_menu_gauche_actif"';
			}
			$liens.='<li '.$actif.'><a href="bonnes_affaires-'.$row['nom'].'.html">'.$row['nom'].'</a></li>';
		}
	}
	else{
		$i = 0;
		while ($row = mysql_fetch_array($sql)){
			$actif='';
			if($i == 0){
				$actif='class="lien_menu_gauche_actif"';
				$i++;
			}
			$liens.='<li '.$actif.'><a href="bonnes_affaires-'.$row['nom'].'.html">'.$row['nom'].'</a></li>';
		}
	}
	return $liens;
}
function recup_contenu(){
	$contenu = '';
	if(isset($_GET['sous_menu'])AND $_GET['sous_menu']!=NULL){
		$sous_menu = htmlentities(utf8_decode(mysql_injection($_GET['sous_menu'])));
		$sql = requete("SELECT * FROM bonnes_affaires WHERE categorie = '".$sous_menu."' ORDER BY id DESC");
		while($row=mysql_fetch_array($sql)){
			$description=remplace_bb_code($row['description']);
			$description=stripslashes($description);
			$titre='<span class="sous_titre">'.stripslashes($row['titre']).'</span><br /><br />';
			$contenu.=$titre.$description.'<br /><br />';
		}
	}
	else{
		$sql = requete("SELECT nom FROM categorie LIMIT 1");
		$row = mysql_fetch_row($sql);
		$defaultCategory = $row[0];
		$sql2 = requete("SELECT * FROM bonnes_affaires WHERE categorie = '".$defaultCategory."' ORDER BY id DESC");
		while($row2 = mysql_fetch_array($sql2)){
			$description=remplace_bb_code($row2['description']);
			$description=stripslashes($description);
			$titre='<span class="sous_titre">'.stripslashes($row2['titre']).'</span><br /><br />';
			$contenu.=$titre.$description.'<br /><br />';
		}
		
	}
	return $contenu;
}
?>