<?php
/////////////////////////////////////////////////////////////////////////////////////////////
// Cr�er une liste des r�f�rences
/////////////////////////////////////////////////////////////////////////////////////////////
function liste_ref(){
	$i=0;
	global $message_admin;
	$sql=requete("SELECT*FROM reference ORDER BY annee DESC");
	$message_admin.='
		<table class="tableau">
			<tr>
				<th>Titre</th>
				<th>Ann�e</th>
				<th>Informations</th>
				<th>Modifications</th>
				<th>Supprimer</th>
			</tr>';
	while ($row = mysql_fetch_array($sql)){
	$message_admin.='
			<tr ';
				if($i++ % 2 ==1){$message_admin.='class="impair"';}
				$message_admin.='><td>'.$row['titre'].'</td>
				<td>'.$row['annee'].'</td>
				<td><span class="info"><img src="vues/images/icones/information.png" alt="" /><span>Derni�re modification '.$row['date'].'</span></span></td> 
				<td>
					<a class="info" href="index.php?page=admin_nouvelle_reference&amp;edit_ref='.$row['id'].'">
						<img src="vues/images/icones/page_edit.png" alt="" /><span>Modifier la r�f�rence</span>
					</a>
					<a class="info" href="javascript:montre_modif(\'edit_annee\',\''.$row['id'].'\');">
						<img src="vues/images/icones/date_edit.png" alt="" /><span>Modifier l\'ann�e de la r�f�rence</span>
					</a>
				</td>
				<td><a class="info" name="supprimer" href="index.php?page=admin_references&amp;delete_ref='.$row['id'].'"><img src="vues/images/icones/delete.png" alt="" /><span>Supprimer la r�f�rence</span></a></td>
			</tr>';
	}
	$message_admin.='</table>';
}
?>