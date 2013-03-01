<?php
include_once('modeles/admin_bonnes_affaires.php');
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
	//Modifier la bonne affaire
	if(isset($_POST['id_ba_modif']) AND $_POST['id_ba_modif']!=NULL AND isset($_POST['categorie']) AND $_POST['categorie']!=NULL AND isset($_POST['titre']) AND $_POST['titre']!=NULL AND isset($_POST['texte']) AND $_POST['texte']!=NULL){
		$id=mysql_injection(nl2br(htmlentities($_POST['id_ba_modif'],ENT_QUOTES)));
		$titre=mysql_injection(nl2br(htmlentities($_POST['titre'],ENT_QUOTES)));
		$texte=mysql_injection(nl2br(htmlentities($_POST['texte'],ENT_QUOTES)));
		$categorie=mysql_injection(nl2br(htmlentities($_POST['categorie'],ENT_QUOTES)));
		$date=date("d-m-y");
		if(requete("UPDATE bonnes_affaires SET titre='".$titre."', description='".$texte."', date='".$date."', categorie='".$categorie."' WHERE id='".$id."'")){
			$message_admin.='<p class="accept">La bonne affaire a �t� correctement modifi�e.</p>';
		}
	}
	//Nouvelle bonne affaire
	elseif(isset($_POST['categorie']) AND $_POST['categorie']!=NULL AND isset($_POST['titre']) AND $_POST['titre']!=NULL AND isset($_POST['texte']) AND $_POST['texte']!=NULL){
		$titre=mysql_injection(nl2br(htmlentities($_POST['titre'],ENT_QUOTES)));
		$texte=mysql_injection(nl2br(htmlentities($_POST['texte'],ENT_QUOTES)));
		$categorie=mysql_injection(nl2br(htmlentities($_POST['categorie'],ENT_QUOTES)));
		$date=date("d-m-y");
		if(requete("INSERT INTO bonnes_affaires(id, titre, description, date, categorie) VALUES('','".$titre."','".$texte."','".$date."','".$categorie."')")){
			$message_admin.='<p class="accept">La bonne affaire a �t� correctement ins�r�e.</p>';
		}
	}
	//Supprimer une bonne affaire
	elseif(isset($_GET['delete_ba']) AND $_GET['delete_ba']!=NULL){
		$delete_ba=mysql_injection($_GET['delete_ba']);
		if(requete("DELETE FROM bonnes_affaires WHERE id='".$delete_ba."'")){
			$message_admin.='<p class="accept">La bonne affaire a �t� correctement supprim�e.</p>';
		}
		else{
			$message_admin.='<p class="erreur">La bonne affaire n\'a pas pu �tre supprim�e.</p>';
		}
	}
	//Nouvelle cat�gorie
	elseif(isset($_POST['add_cat']) AND $_POST['add_cat']!= NULL){
		if($_POST['id_modif']!=NULL){
			$id=mysql_injection($_POST['id_modif']);
			$categorie=mysql_injection(htmlentities($_POST['add_cat'],ENT_QUOTES));
			$sql=requete("SELECT nom FROM categorie WHERE id='".$id."'");
			$row=mysql_fetch_row($sql);
			$ancien_nom_categorie=$row[0];
			if(requete("UPDATE categorie SET nom='".$categorie."' WHERE id='".$id."'")){
				if(requete("UPDATE bonnes_affaires SET categorie='".$categorie."' WHERE categorie='".$ancien_nom_categorie."'")){
					$message_admin.='<p class="accept">La cat�gorie a �t� correctement modifi�e.</p>';
				}
				else{
					$message_admin.='<p class="erreur">La cat�gorie n\'a pas pu �tre modifi�e.</p>';
				}
			}
			else{
				$message_admin.='<p class="erreur">La cat�gorie n\'a pas pu �tre modifi�e.</p>';
			}
		}
		else{
			$nouvelle_categorie=mysql_injection(htmlentities($_POST['add_cat'],ENT_QUOTES));
			if(requete("INSERT INTO categorie(nom) VALUES('".$nouvelle_categorie."')")){
				$message_admin.='<p class="accept">La cat�gorie a �t� correctement ajout�e.</p>';
			}
			else{
				$message_admin.='<p class="erreur">La cat�gorie n\'a pas pu �tre ajout�e.</p>';
			}
		}
	}
	//Supprimer une cat�gorie
	elseif(isset($_GET['delete_categorie']) AND $_GET['delete_categorie']!=NULL){
		$delete_categorie=mysql_injection($_GET['delete_categorie']);
		if(requete("DELETE FROM categorie WHERE id='".$delete_categorie."'")){
			$message_admin.='<p class="accept">La categorie a �t� correctement supprim�e.</p>';
		}
		else{
			$message_admin.='<p class="erreur">La categorie n\'a pas pu �tre supprim�e.</p>';
		}
	}
	liste_ba();
	liste_categorie();
	include_once('vues/admin_bonnes_affaires.php');
}
?>