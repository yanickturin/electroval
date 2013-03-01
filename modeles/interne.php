<?php
function recup_contenu(){
	$contenu = '';
	$sql = requete("SELECT * FROM news");
	while($row = mysql_fetch_array($sql)){
		$description=remplace_bb_code($row['description']);
		$description=stripslashes($description);
		$titre='<span class="sous_titre">'.stripslashes($row['titre']).'</span><br /><br />';
		$contenu.=$titre.$description.'<br /><br />';
	}
	return $contenu;
}
?>