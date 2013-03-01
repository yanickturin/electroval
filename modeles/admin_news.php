<?php
/////////////////////////////////////////////////////////////////////////////////////////////
// Créer une liste des bonnes affaires
/////////////////////////////////////////////////////////////////////////////////////////////
function liste_news(){
	$i=0;
	global $message_admin;
	$sql=requete("SELECT*FROM news");
	$message_admin.='
		<table class="tableau">
			<tr>
				<th>Titre</th>
				<th>Informations</th>
				<th>Modification</th>
				<th>Supprimer</th>
			</tr>';
	while ($row = mysql_fetch_array($sql)){
	$message_admin.='
			<tr ';
				if($i++ % 2 ==1){$message_admin.='class="impair"';}
				$message_admin.='><td>'.$row['titre'].'</td>
				<td><span class="info"><img src="vues/images/icones/information.png" alt="" /><span>Dernière modification '.$row['date'].'</span></span></td> 
				<td>
					<a class="info" href="index.php?page=admin_nouvelle_news&amp;edit_news='.$row['id'].'">
						<img src="vues/images/icones/page_edit.png" alt="" /><span>Modifier la news</span>
					</a>
				</td>
				<td><a class="info" name="supprimer" href="index.php?page=admin_news&amp;delete_news='.$row['id'].'"><img src="vues/images/icones/delete.png" alt="" /><span>Supprimer la news</span></a></td>
			</tr>';
	}
	$message_admin.='</table>';
}
?>