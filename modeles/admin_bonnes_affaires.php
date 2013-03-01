<?php
/////////////////////////////////////////////////////////////////////////////////////////////
// Créer une liste des bonnes affaires
/////////////////////////////////////////////////////////////////////////////////////////////
function liste_ba(){
	$i=0;
	global $message_admin;
	$sql=requete("SELECT*FROM bonnes_affaires ORDER BY categorie DESC");
	$message_admin.='
		<table class="tableau">
			<tr>
				<th>Titre</th>
				<th>Catégorie</th>
				<th>Informations</th>
				<th>Modification</th>
				<th>Supprimer</th>
			</tr>';
	while ($row = mysql_fetch_array($sql)){
	$message_admin.='
			<tr ';
				if($i++ % 2 ==1){$message_admin.='class="impair"';}
				$message_admin.='><td>'.$row['titre'].'</td>
				<td>'.$row['categorie'].'</td>
				<td><span class="info"><img src="vues/images/icones/information.png" alt="" /><span>Dernière modification '.$row['date'].'</span></span></td> 
				<td>
					<a class="info" href="index.php?page=admin_nouvelle_bonne_affaire&amp;edit_ba='.$row['id'].'">
						<img src="vues/images/icones/page_edit.png" alt="" /><span>Modifier la bonne affaire</span>
					</a>
				</td>
				<td><a class="info" name="supprimer" href="index.php?page=admin_bonnes_affaires&amp;delete_ba='.$row['id'].'"><img src="vues/images/icones/delete.png" alt="" /><span>Supprimer la bonne affaire</span></a></td>
			</tr>';
	}
	$message_admin.='</table>';
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Créer une liste des catégories
/////////////////////////////////////////////////////////////////////////////////////////////
function liste_categorie(){
	$i=0;
	global $message_admin;
	$sql=requete("SELECT*FROM categorie ORDER BY nom DESC");
	$message_admin.='
		<table class="tableau">
			<tr>
				<th>Catégorie</th>
				<th>Modification</th>
				<th>Supprimer</th>
			</tr>';
	while ($row = mysql_fetch_array($sql)){
	$message_admin.='
			<tr ';
				if($i++ % 2 ==1){$message_admin.='class="impair"';}
				$message_admin.='>
				<td>'.$row['nom'].'</td>
				<td>
					<a class="info" href="javascript:montre_modif(\'add_categorie\',\''.$row['id'].'\');">
						<img src="vues/images/icones/page_edit.png" alt="" /><span>Modifier la catégorie</span>
					</a>
				</td>
				<td><a class="info" name="supprimer" href="index.php?page=admin_bonnes_affaires&amp;delete_categorie='.$row['id'].'"><img src="vues/images/icones/delete.png" alt="" /><span>Supprimer la catégorie</span></a></td>
			</tr>';
	}
	$message_admin.='</table>';
}
?>