<?php
include_once('modeles/admin_news.php');
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
	//Modifier la news
	if(isset($_POST['id_news_modif']) AND $_POST['id_news_modif']!=NULL AND isset($_POST['titre']) AND $_POST['titre']!=NULL AND isset($_POST['texte']) AND $_POST['texte']!=NULL){
		$id=mysql_injection(nl2br(htmlentities($_POST['id_news_modif'],ENT_QUOTES)));
		$titre=mysql_injection(nl2br(htmlentities($_POST['titre'],ENT_QUOTES)));
		$texte=mysql_injection(nl2br(htmlentities($_POST['texte'],ENT_QUOTES)));
		$date=date("d-m-y");
		if(requete("UPDATE news SET titre='".$titre."', description='".$texte."', date='".$date."' WHERE id='".$id."'")){
			$message_admin.='<p class="accept">La news a été correctement modifiée.</p>';
		}
	}
	//Nouvelle news
	elseif(isset($_POST['titre']) AND $_POST['titre']!=NULL AND isset($_POST['texte']) AND $_POST['texte']!=NULL){
		$titre=mysql_injection(nl2br(htmlentities($_POST['titre'],ENT_QUOTES)));
		$texte=mysql_injection(nl2br(htmlentities($_POST['texte'],ENT_QUOTES)));
		$date=date("d-m-y");
		if(requete("INSERT INTO news(id, titre, description, date) VALUES('','".$titre."','".$texte."','".$date."')")){
			$message_admin.='<p class="accept">La news a été correctement insérée.</p>';
		}
	}
	//Supprimer une news
	elseif(isset($_GET['delete_news']) AND $_GET['delete_news']!=NULL){
		$delete_news=mysql_injection($_GET['delete_news']);
		if(requete("DELETE FROM news WHERE id='".$delete_news."'")){
			$message_admin.='<p class="accept">La news a été correctement supprimée.</p>';
		}
		else{
			$message_admin.='<p class="erreur">La news n\'a pas pu être supprimée.</p>';
		}
	}
	liste_news();
	include_once('vues/admin_news.php');
}
?>