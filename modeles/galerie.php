<?php
function recup_contenu(){
	$contenu = '';
	if(isset($_GET['sous_menu'])AND $_GET['sous_menu']!=NULL){
		$sous_menu = htmlentities(utf8_decode(mysql_injection($_GET['sous_menu'])));
		$sql = requete("SELECT * FROM galerie WHERE titre = '".$sous_menu."'");
		while($row=mysql_fetch_array($sql)){
			$description=remplace_bb_code($row['description']);
			$description=stripslashes($description);
			$titre='<span class="sous_titre">'.stripslashes($row['titre']).'</span><br /><br />';
			$contenu.=$titre.$description.'<br /><br />';
			$dir = $row['dossier'];
			if (is_dir($dir)){
				if ($dh = opendir($dir)){
					while (($file = readdir($dh)) !== false){
						if(!is_dir($dir.$file)){
							if($file != '.' AND $file != '..'){
								//$mimeContentType = mime_content_type($dir.$file);
								//echo $mimeContentType;
								//$array = array('image/jpeg');
								//if(in_array($mimeContentType,$array)){
									$contenu .= '<a href="'.$dir.$file.'" rel="lightbox['.$dir.']">
												<img src="'.$dir.'thumbs/'.$file.'" alt="" />
											</a>';
								//}
							}
						}
					}
					closedir($dh);
				}
			}
		}
	}
	else{
		$sql = requete("SELECT * FROM galerie");
		while($row=mysql_fetch_array($sql)){
			$description=remplace_bb_code($row['description']);
			$description=stripslashes($description);
			$titre='<span class="sous_titre">'.stripslashes($row['titre']).'</span><br /><br />';
			$contenu.=$titre.$description.'<br /><br />';
			$dir = $row['dossier'];
			$i = 0;
			if (is_dir($dir)){
				if ($dh = opendir($dir)){
					while (($file = readdir($dh)) !== false AND $i<3){
						if(!is_dir($dir.$file)){
							if($file != '.' AND $file != '..'){
								//$mimeContentType = mime_content_type($dir.$file);
								//echo $mimeContentType;
								//$array = array('image/jpeg');
								//if(in_array($mimeContentType,$array)){
									$contenu .= '<a href="'.$dir.$file.'" rel="lightbox['.$dir.']">
												<img src="'.$dir.'thumbs/'.$file.'" alt="" />
											</a>';
									$i++;
								//}
							}
						}
					}
					closedir($dh);
				}
			}
			$contenu .= '<br /><p class="droite"><a href="galerie-'.$row['titre'].'.html">Accéder à toutes les photos!</a></p>';
		}
	}
	return $contenu;
}
?>