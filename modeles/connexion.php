<?php
//--------------------------------------------
// Fonction permettant de se connecter
//--------------------------------------------
function check_connexion(){
	global $table_membre;
	global $message_connexion;
	global $is_connecte;
	if(!connecte()){//On appelle la fonction pour vérifié si la personne ne serait pas déjà connectée
		if(isset($_POST['login'])AND isset($_POST['password'])){//Si les variables POST existent
			if($_POST['login']!=NULL AND $_POST['password']!=NULL){//Si elles sont bien remplies
				if(login_existe()){//On vérifie si le login existe
					if(password_true()){//Si le password est juste
						//Connecté on crée les variables de sessions
						$login=htmlentities($_POST['login'],ENT_QUOTES);
						$_SESSION['login']=$login;
						$_SESSION['id_session']=session_id();
						requete("UPDATE ".$table_membre." SET id_session='" . $_SESSION['id_session'] . "' WHERE login='" . $login . "'")or die(mysql_error());//On update l'id de session
						return true;
					}
					else{
						$message_connexion = '<p class="erreur">Le password entré est faux.</p>';
						return false;
					}
				}
				else{
					$message_connexion = '<p class="erreur">Le login entré n\'existe pas.</p>';
					return false;
				}
			}
			else{
				$message_connexion = '<p class="erreur">Vous n\'avez pas rempli tout les champs.</p>';
				return false;
			}
		}
		else{//Afficher le formulaire de connexion
			return false;
		}
	}
	else{
		if(isset($_GET['deconnexion'])AND $_GET['deconnexion']==1){
			session_destroy();
			$message_connexion = '<p class="erreur">Déconnexion effectuée.</p>';
			return false;
		}
		else{
			$is_connecte=1;
			$message_connexion = '<p class="erreur">Vous êtes déjà connecté en tant qu\'<span class="bold">'.htmlentities($_SESSION['login']).'</span>. <a href="index.php?page=connexion&deconnexion=1">Déconnexion</a>?</p>';
			return false;
		}
	}
}