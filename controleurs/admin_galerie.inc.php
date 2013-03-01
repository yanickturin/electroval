<?php
include_once('modeles/admin_galerie.php');
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
	//Modifier la album
	if(isset($_POST['id_album_modif']) AND $_POST['id_album_modif']!=NULL AND isset($_POST['titre']) AND $_POST['titre']!=NULL AND isset($_POST['texte']) AND $_POST['texte']!=NULL AND isset($_POST['dossier']) AND $_POST['dossier']!=NULL){
		$id=mysql_injection(nl2br(htmlentities($_POST['id_album_modif'],ENT_QUOTES)));
		$titre=mysql_injection(nl2br(htmlentities($_POST['titre'],ENT_QUOTES)));
		$texte=mysql_injection(nl2br(htmlentities($_POST['texte'],ENT_QUOTES)));
		$dossier=mysql_injection(nl2br(htmlentities($_POST['dossier'],ENT_QUOTES)));
		$date=date("d-m-y");
		if(requete("UPDATE galerie SET titre='".$titre."', description='".$texte."', date='".$date."' dossier='".$dossier."' WHERE id='".$id."'")){
			$message_admin.='<p class="accept">L\'album a été correctement modifié.</p>';
		}
	}
	//Nouvel album
	elseif(isset($_POST['titre']) AND $_POST['titre']!=NULL AND isset($_POST['texte']) AND $_POST['texte']!=NULL AND isset($_POST['dossier']) AND $_POST['dossier']!=NULL){
		$titre=mysql_injection(nl2br(htmlentities($_POST['titre'],ENT_QUOTES)));
		$texte=mysql_injection(nl2br(htmlentities($_POST['texte'],ENT_QUOTES)));
		$dossier=mysql_injection(nl2br(htmlentities($_POST['dossier'],ENT_QUOTES)));
		$date=date("d-m-y");
		if(requete("INSERT INTO galerie(id, titre, description, date, dossier) VALUES('','".$titre."','".$texte."','".$date."','".$dossier."')")){
			$message_admin.='<p class="accept">L\'album a été correctement insérée.</p>';
		}
	}
	//Supprimer un album
	elseif(isset($_GET['delete_album']) AND $_GET['delete_album']!=NULL){
		$delete_album=mysql_injection($_GET['delete_album']);
		if(requete("DELETE FROM galerie WHERE id='".$delete_album."'")){
			$message_admin.='<p class="accept">L\'album a été correctement supprimé.</p>';
		}
		else{
			$message_admin.='<p class="erreur">L\'album n\'a pas pu être supprimé.</p>';
		}
	}
	liste_album();
	include_once('vues/admin_galerie.php');
}
?>