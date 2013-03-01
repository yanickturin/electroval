<?php
/////////////////////////////////////////////////////////////////////////////////////////////
// Créer une liste des bonnes affaires
/////////////////////////////////////////////////////////////////////////////////////////////
function liste_album(){
	$i=0;
	global $message_admin;
	$sql=requete("SELECT*FROM galerie");
	$message_admin.='
		<table class="tableau">
			<tr>
				<th>Titre</th>
				<th>Dossier</th>
				<th>Informations</th>
				<th>Modification</th>
				<th>Supprimer</th>
			</tr>';
	while ($row = mysql_fetch_array($sql)){
	$message_admin.='
			<tr ';
				if($i++ % 2 ==1){$message_admin.='class="impair"';}
				$message_admin.='><td>'.$row['titre'].'</td>
				<td>'.$row['dossier'].'</td>
				<td><span class="info"><img src="vues/images/icones/information.png" alt="" /><span>Dernière modification '.$row['date'].'</span></span></td> 
				<td>
					<a class="info" href="index.php?page=admin_nouvel_album&amp;edit_album='.$row['id'].'">
						<img src="vues/images/icones/page_edit.png" alt="" /><span>Modifier l\'album</span>
					</a>
				</td>
				<td><a class="info" name="supprimer" href="index.php?page=admin_galerie&amp;delete_album='.$row['id'].'"><img src="vues/images/icones/delete.png" alt="" /><span>Supprimer l\'album</span></a></td>
			</tr>';
	}
	$message_admin.='</table>';
}
?>