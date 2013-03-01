<?php
$table_membre='users';
$message_changement_password='';
if(!connecte()){
	header('Location:'.ADRESSE_SITE.'/connexion.html');
}
elseif(!isAdmin()){
	header('Location:'.ADRESSE_SITE.'/connexion.html');
}
else{
	ob_end_flush();
	$message = '';
	if(isset($_POST['password_actuel']) AND isset($_POST['nouveau_password']) AND isset($_POST['nouveau_password_retaper']) AND $_POST['password_actuel']!=NULL AND $_POST['nouveau_password']!=NULL AND $_POST['nouveau_password_retaper']!=NULL){
		$login=htmlspecialchars($_SESSION['login']);
		$sql=requete("SELECT password FROM ".$table_membre." WHERE login='".$login."'");
		$data=mysql_fetch_array($sql);
		$mdp=$data['password'];
		$ancien_mdp=md5($_POST['password_actuel']);
		if($ancien_mdp==$mdp){
			if($_POST['nouveau_password']==$_POST['nouveau_password_retaper']){
				$nouveau_mdp=md5($_POST['nouveau_password']);
				$sql=requete("UPDATE ".$table_membre." SET password='".$nouveau_mdp."' WHERE login='".$login."'");
				$message="<p class='accept'>Changement de mot de passe effectué avec succès.</p>";
			}
			else{
				$message="<p class='erreur'>Le changement de mot de passe à échoué:<br />Cause: les deux nouveaux mot de passe ne sont pas identiques.</p>";
			}
		}
		else{
			$message="<p class='erreur'>Le changement de mot de passe à échoué:<br />Cause: l'ancien mot de passe n'est pas valide.</p>";
		}
	}
	include('vues/changement_password.php');
}
?>