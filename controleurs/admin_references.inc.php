<?php
include_once('modeles/admin_references.php');
if(!connecte()){
	header('Location:'.ADRESSE_SITE.'/connexion.html');
}
elseif(!isAdmin()){
	header('Location:'.ADRESSE_SITE.'/connexion.html');
}
else{
	ob_end_flush();
	$dir="/media/";
	$message_admin='';
	//Modifier la r�f�rence
	if(isset($_POST['id_ref_modif']) AND $_POST['id_ref_modif']!=NULL AND isset($_POST['annee']) AND $_POST['annee']!=NULL AND isset($_POST['titre']) AND $_POST['titre']!=NULL AND isset($_POST['texte']) AND $_POST['texte']!=NULL){
		$id=mysql_injection(nl2br(htmlspecialchars($_POST['id_ref_modif'],ENT_QUOTES)));
		$titre=mysql_injection(nl2br(htmlspecialchars($_POST['titre'],ENT_QUOTES)));
		$texte=mysql_injection(nl2br(htmlspecialchars($_POST['texte'],ENT_QUOTES)));
		$annee=mysql_injection(nl2br(htmlspecialchars($_POST['annee'],ENT_QUOTES)));
		$date=date("d-m-y");
		if(requete("UPDATE reference SET titre='".$titre."', description='".$texte."', date='".$date."', annee='".$annee."' WHERE id='".$id."'")){
			$message_admin.='<p class="accept">La r�f�rence a �t� correctement modifi�e.</p>';
		}
	}
		//Nouvelle r�f�rence
	elseif(isset($_POST['annee']) AND $_POST['annee']!=NULL AND isset($_POST['titre']) AND $_POST['titre']!=NULL AND isset($_POST['texte']) AND $_POST['texte']!=NULL){
		$titre=mysql_injection(nl2br(htmlspecialchars($_POST['titre'],ENT_QUOTES)));
		$texte=mysql_injection(nl2br(htmlspecialchars($_POST['texte'],ENT_QUOTES)));
		$annee=mysql_injection(nl2br(htmlspecialchars($_POST['annee'],ENT_QUOTES)));
		$date=date("d-m-y");
		if(requete("INSERT INTO reference(id, titre, description, date, annee) VALUES('','".$titre."','".$texte."','".$date."','".$annee."')")){
			$message_admin.='<p class="accept">La r�f�rence a �t� correctement ins�r�e.</p>';
		}
	}
	//Modifier l'ann�e d'une r�f�rence
	elseif(isset($_POST['annee_edit_ref']) AND $_POST['annee_edit_ref']!=NULL AND isset($_POST['id_modif']) AND $_POST['id_modif']!=NULL){
		$annee=mysql_injection(nl2br(htmlspecialchars($_POST['annee_edit_ref'],ENT_QUOTES)));
		$id=mysql_injection($_POST['id_modif']);
		if(requete("UPDATE reference SET annee='".$annee."' WHERE id='".$id."'")){
			$message_admin.='<p class="accept">L\'ann�e de la r�f�rence a �t� correctement modifi�e.</p>';
		}
		else{
			$message_admin.='<p class="erreur">L\'ann�e de la r�f�rence n\'a pas pu �tre modifi�e.</p>';
		}
	}
	//Supprimer une r�f�rence
	elseif(isset($_GET['delete_ref']) AND $_GET['delete_ref']!=NULL){
		$delete_ref=mysql_injection($_GET['delete_ref']);
		if(requete("DELETE FROM reference WHERE id='".$delete_ref."'")){
			$message_admin.='<p class="accept">La r�f�rence a �t� correctement supprim�e.</p>';
		}
		else{
			$message_admin.='<p class="erreur">La r�f�rence n\'a pas pu �tre supprim�e.</p>';
		}
	}
	liste_ref();
	include_once('vues/admin_references.php');
}
?>