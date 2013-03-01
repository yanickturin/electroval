<?php
/////////////////////////////////////////////////////////////////////////////////////////////
// Explorer le répertoire media
/////////////////////////////////////////////////////////////////////////////////////////////
function explore_dir($dir){
	$type=array();
	$adresse=array();
	$nom=array();
	$type_fichier=array();
	$adresse_fichier=array();
	$nom_fichier=array();
	$poids_fichier=array();
	$hauteur=array();
	$largeur=array();
	$hauteur_miniature=array();
	$largeur_miniature=array();
	$open_dir=opendir($dir);
	while(($file = readdir($open_dir)) !== false) {
		if($file!='.' && $file!='..'){
			if(is_dir($dir.'/'.$file)){
				$type[]='dossier';
				$adresse[]=$dir.$file.'/';
				$nom[]=$file;
			}
			else{
				//if(mime_content_type($dir.$file)=='image/jpeg'){
					list($height_min, $width_min)=TailleMiniature($dir.$file, 150);
					$type_fichier[]='image';
					$adresse_fichier[]= $dir.$file;
					$nom_fichier[]=$file;
					list($width, $height)=getimagesize($dir.$file);
					$poids=filesize($dir.$file);
					$poids=getsizename($poids);
					$poids_fichier[]=$poids;
					$hauteur[]=$height;
					$largeur[]=$width;
					$hauteur_miniature[]=$height_min;
					$largeur_miniature[]=$width_min;
				//}
			}
		}
	}
	closedir($open_dir);
	return array($type,$adresse,$nom, $type_fichier, $adresse_fichier, $nom_fichier, $poids_fichier, $hauteur, $largeur, $hauteur_miniature, $largeur_miniature);
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Supprimer un fichier
/////////////////////////////////////////////////////////////////////////////////////////////
function supprimer_fichier(){
	if(is_file($_GET['supprimer_f'])){
		if(preg_match("#^media/#",$_GET['supprimer_f'])){
			if(!preg_match("#[.]{2,}#",$_GET['supprimer_f'])){
				if(chmod($_GET['supprimer_f'], 0600)){
					unlink($_GET['supprimer_f']);
					$message_admin_images='<p class="accept">Fichier supprimé avec succès.</p>';
					return $message_admin_images;
				}
				else{
					$message_admin_images='<p class="erreur">Vous n\'avez pas les droits pour supprimer ce fichier.</p>';
					return $message_admin_images;
				}
			}
			else{
				$message_admin_images='<p class="erreur">Vous ne pouvez pas supprimer ce fichier (un . en trop).</p>';
				return $message_admin_images;
			}
		}
		else{
			$message_admin_images='<p class="erreur">Vous ne pouvez pas supprimer ce fichier.</p>';
			return $message_admin_images;
		}
	}
	else{
		$message_admin_images='<p class="erreur">Le fichier que vous voulez supprimer n\'existe pas.</p>';
		return $message_admin_images;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Supprimer un dossier
/////////////////////////////////////////////////////////////////////////////////////////////
function supprimer_dossier(){
	if(is_dir($_GET['supprimer_d'])){
		if(preg_match("#^media/#",$_GET['supprimer_d'])){
			if(!preg_match("#[.]#",$_GET['supprimer_d'])){
				if(isemptydir($_GET['supprimer_d'])){
					if(chmod($_GET['supprimer_d'], 0600)){
						rmdir($_GET['supprimer_d']);
						$message_admin_images='<p class="accept">Dossier supprimé avec succès.</p>';
						return $message_admin_images;
					}
					else{
						$message_admin_images='<p class="erreur">Vous n\'avez pas les droits pour supprimer ce dossier.</p>';
						return $message_admin_images;
					}
				}
				else{
					$message_admin_images='<p class="erreur">Vous ne pouvez pas supprimer ce dossier car il contient encore des fichiers.</p>';
					return $message_admin_images;
				}
			}
			else{
				$message_admin_images='<p class="erreur">Vous ne pouvez pas supprimer ce dossier (un . en trop).</p>';
				return $message_admin_images;
			}
		}
		else{
			$message_admin_images='<p class="erreur">Vous n\'avez pas les droits pour supprimer ce dossier.</p>';
			return $message_admin_images;
		}
	}
	else{
		$message_admin_images='<p class="erreur">Le dossier que vous voulez supprimer n\'existe pas.</p>';
		return $message_admin_images;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Ajouter un dossier
/////////////////////////////////////////////////////////////////////////////////////////////
function ajout_dossier(){
	if(is_dir($_POST['dir'])){
		if(!is_dir($_POST['dir'].$_POST['dossier'])){
			if(preg_match("#^media/#",$_POST['dir'])){
				if(preg_match("#^[a-zA-Z0-9_]+$#",$_POST['dossier'])){
					mkdir($_POST['dir'].$_POST['dossier']);
					chmod($_POST['dir'].$_POST['dossier'],0777);
					$message_admin_images='<p class="accept">Le dossier <span class="bold">'.$_POST['dossier'].'</span> a été correctement créé.</p>';
					return $message_admin_images;
				}
				else{
					$message_admin_images='<p class="erreur">Le nom de votre dossier ne doit comporter que des lettres, des chiffres ou des underscore.</p>';
					return $message_admin_images;
				}
			}
			else{
				$message_admin_images='<p class="erreur">Le dossier de destination est faux.</p>';
				return $message_admin_images;
			}
		}
		else{
			$message_admin_images='<p class="erreur">Le dossier que vous voulez créer existe déjà.</p>';
			return $message_admin_images;
		}
	}
	else{
		$message_admin_images='<p class="erreur">Le dossier de destination n\'existe pas.</p>';
		return $message_admin_images;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Ajouter une image
/////////////////////////////////////////////////////////////////////////////////////////////
function ajout_image(){
	if(is_dir($_POST['dir'])){
		if(!file_exists($_POST['dir'].$_FILES['image']['name'])){
			if(preg_match("#^media/#",$_POST['dir'])){
				define('MAXSIZE', return_bytes(ini_get('post_max_size')));
				if($_FILES['image']['size']>MAXSIZE OR $_FILES['image']['size']==0){
					$message_admin_images='<p class="erreur">La taille de votre fichier n\'est pas acceptée, il doit faire au minimum 1 kilo et au maximum '.MAXSIZE.'</p>';
					return $message_admin_images;
				}
				if(!is_uploaded_file($_FILES['image']['tmp_name'])){
					$message_admin_images='<p class="erreur">Un problème est survenu durant l\'opération.</p>';
					return $message_admin_images;
				} 
				else{
					$patterns[0] = '/JPG/';
					$patterns[1] = '/JPEG/';
					$patterns[2] = '/GIF/';
					$patterns[3] = '/PNG/';
					$patterns[4] = '/BMP/';
					$patterns[5] = '/é/';
					$patterns[6] = '/è/';
					$patterns[7] = '/à/';
					$patterns[8] = '/-/';
					$patterns[11] = '/ /';
					$patterns[12] = '/%/';
					$patterns[13] = '/.php/';
					$patterns[14] = '/.js/';
					$patterns[15] = '/jpeg/';
					$replacements[15] = 'jpg';
					$replacements[14] = '_';
					$replacements[13] = '_';
					$replacements[12] = '_';
					$replacements[11] = '_';
					$replacements[8] = '_';
					$replacements[7] = 'a';
					$replacements[6] = 'e';
					$replacements[5] = 'e';
					$replacements[4] = 'bmp';
					$replacements[3] = 'png';
					$replacements[2] = 'gif';
					$replacements[1] = 'jpg';
					$replacements[0] = 'jpg';
					ksort($patterns);
					ksort($replacements);
					$_FILES['image']['name']=preg_replace($patterns, $replacements, $_FILES['image']['name']);
					$_FILES['image']['name']=strtr($_FILES['image']['name'],'àâäåãáÂÄÀÅÃÁæÆçÇéèêëÉÊËÈïîìíÏÎÌÍñÑöôóòõÓÔÖÒÕšùûüúÜÛÙÚıÿ','aaaaaaaaaaaaaacceeeeeeeeiiiiiiiinnoooooooooosuuuuuuuuyyz');       
					if($_FILES['image']['type'] == 'image/jpeg' OR $_FILES['image']['type'] == 'image/pjpeg' ){
							if(move_uploaded_file($_FILES['image']['tmp_name'], REALPATH_SITE.$_POST['dir'].$_FILES['image']['name'])){
							resizeImage(REALPATH_SITE.$_POST['dir'].$_FILES['image']['name'],800);
							chmod(REALPATH_SITE.$_POST['dir'].$_FILES['image']['name'],0644);
							$message_admin_images="<p class=\"accept\">Fichier correctement uploadé.</p>";
							return $message_admin_images;
						}
						else{
							$message_admin_images="<p class=\"erreur\">Impossible de copier le fichier dans le chemin de destination.</p>";
							return $message_admin_imagese;
						}
					}
					else{
						$message_admin_images="<p class=\"erreur\">Le fichier doit être de type .jpg ou .jpeg.</p>";
						return $message_admin_images;
					}
				}
			}
			else{
				$message_admin_images='<p class="erreur">Le dossier de destination est faux.</p>';
				return $message_admin_images;
			}
		}
		else{
			$message_admin_images='<p class="erreur">Le fichier que vous voulez ajouter existe déjà.</p>';
			return $message_admin_images;
		}
	}
	else{
		$message_admin_images='<p class="erreur">Le dossier de destination n\'existe pas.</p>';
		return $message_admin_images;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Modification d'une image
/////////////////////////////////////////////////////////////////////////////////////////////
function modification_image(){
	if(file_exists($_POST['id_modif'])){
		$type_fichier=mime_content_type($_POST['id_modif']);
		if($type_fichier=='image/jpeg'){
			list($largeur_original, $hauteur_original) = getimagesize($_POST['id_modif']);
			$image_source = imagecreatefromjpeg($_POST['id_modif']);
			if($_POST['prop_largeur']==true){
				if(is_numeric($_POST['largeur'])){
					$pourcentage=$_POST['largeur']/$largeur_original*100;
					$hauteur=$hauteur_original-(100-$pourcentage)*($hauteur_original/100);
					$image_redim = imagecreatetruecolor($_POST['largeur'], $hauteur);
					imagecopyresized($image_redim, $image_source, 0, 0, 0, 0, $_POST['largeur'], $hauteur, $largeur_original, $hauteur_original);
					unlink($_POST['id_modif']);
					imagejpeg($image_redim , $_POST['id_modif'], 100);
					$message_admin_images='<p class="accept">L\'image a été correctement modifiée.</p>';
					return $message_admin_images;
				}
				else{
					$message_admin_images='<p class="erreur">La largeur donnée n\'est pas un nombre.</p>';
					return $message_admin_images;
				}
			}
			elseif($_POST['prop_hauteur']==true){
				if(is_numeric($_POST['hauteur'])){
					$pourcentage=$_POST['hauteur']/$hauteur_original*100;
					$largeur=$largeur_original-(100-$pourcentage)*($largeur_original/100);
					$image_redim = imagecreatetruecolor($largeur, $_POST['hauteur']);
					imagecopyresized($image_redim, $image_source, 0, 0, 0, 0, $largeur, $_POST['hauteur'], $largeur_original, $hauteur_original);
					unlink($_POST['id_modif']);
					imagejpeg($image_redim , $_POST['id_modif'], 100);
					$message_admin_images='<p class="accept">L\'image a été correctement modifiée.</p>';
					return $message_admin_images;
				}
				else{
					$message_admin_images='<p class="erreur">La hauteur donnée n\'est pas un nombre.</p>';
					return $message_admin_images;
				}
			}
			else{
				if(is_numeric($_POST['hauteur'])){
					if(is_numeric($_POST['largeur'])){
						$image_redim = imagecreatetruecolor($_POST['largeur'], $_POST['hauteur']);
						imagecopyresized($image_redim, $image_source, 0, 0, 0, 0, $_POST['largeur'], $_POST['hauteur'], $largeur_original, $hauteur_original);
						unlink($_POST['id_modif']);
						imagejpeg($image_redim , $_POST['id_modif'], 100);
						$message_admin_images='<p class="accept">L\'image a été correctement modifiée.</p>';
						return $message_admin_images;
					}
					else{
						$message_admin_images='<p class="erreur">La largeur donnée n\'est pas un nombre.</p>';
						return $message_admin_images;
					}
				}
				else{
					$message_admin_images='<p class="erreur">La hauteur donnée n\'est pas un nombre.</p>';
					return $message_admin_images;
				}
			}
		 }
		else{
			$message_admin_images='<p class="erreur">Le fichier que vous voulez modifier n\'est pas de type jpeg.</p>';
			return $message_admin_images;
		}
	}
	else{
		$message_admin_images='<p class="erreur">Le fichier que vous voulez modifier n\'existe pas.</p>';
		return $message_admin_images;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Ajout d'un zip
/////////////////////////////////////////////////////////////////////////////////////////////
function ajout_zip(){
	$message = '';
	$variablePOST = 'zip';
	$numberOfFiles = '';
	if(checkUpload($variablePOST,$message)){
		$arrayMimeType = array('application/zip','multipart/x-zip','multipart/x-gzip');
		if(!in_array($_FILES[$variablePOST]['type'],$arrayMimeType)){
			$message .= "<p class=\"erreur\">Le fichier doit être de type .zip.</p>";
			return $message;
		}
		else{
			$zip = new Zip();
			$zip -> filename = $_FILES[$variablePOST]['name'];
			$zip -> tempName = $_FILES[$variablePOST]['tmp_name'];
			$zip -> dirForFiles = $_POST['dir'];
			$zip -> dirForThumbs = $_POST['dir'].'thumbs/';
			$zip -> tempDir = str_replace("\\","/",getcwd() . '/tmp/');
			$zip -> width = 800;
			if($zip -> moveZipToTemp()){
				$numberOfFiles = $zip -> numberOfFiles;
				$message = '<p class="accept">'.$numberOfFiles.' images ont été correctement ajoutées.</p>';
				return $message;
			}
			else{
				return $message;
			}
		}
	}
	else{
		return $message;
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
// Check de l'upload
/////////////////////////////////////////////////////////////////////////////////////////////
function  checkUpload($variablePOST, &$message){
	if(is_dir($_POST['dir'])){
		if(preg_match("#^media/#",$_POST['dir'])){
			define('MAXSIZE', return_bytes(ini_get('post_max_size')));
			$maxSize = ini_get('post_max_size');
			if($_FILES[$variablePOST]['size']>MAXSIZE OR $_FILES[$variablePOST]['size']==0){
				$message .= '<p class="erreur">La taille de votre fichier n\'est pas acceptée, il doit faire au minimum 1 kilo et au maximum '.$maxSize.'.</p>';
				return false;
			}
			if(!is_uploaded_file($_FILES[$variablePOST]['tmp_name'])){
				$message .= '<p class="erreur">Un problème est survenu durant l\'opération.</p>';
				return false;
			}
			else{
				$message .= '<p class="accept">L\'upload c\'est bien passé.</p>';
				return true;
			}
		}
		else{
			$message .= '<p class="erreur">Le dossier de destination est faux.</p>';
			return false;
		}
	}
	else{
		$message .= '<p class="erreur">Le dossier de destination n\'existe pas.</p>';
		return false;
	}
}
function return_bytes($val) {
    $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    switch($last) {
        // The 'G' modifier is available since PHP 5.1.0
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
    }

    return $val;
}
?>