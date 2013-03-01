<?php
ob_start();
error_reporting(E_ALL);
//--------------------------------------------
//	Author: Conception-Web.ch | François Wagner
//	Description: 
//		Index principal du site web.
//	Date: 21.08.08
//	Version: 1.1
//--------------------------------------------
session_start();
include_once('config.php');
include_once('modeles/fonctions.php');
if(!empty($_GET['page'])){
	$page=htmlspecialchars($_GET['page']);
	$pattern = '#^[a-zA-Z0-9_]+$#';
	if(preg_match($pattern,$page)){
		$filename='controleurs/'.$page.'.inc.php';
		if(file_exists($filename)){
			$titre_page=ucfirst($page);
			$titre_page=preg_replace('/_/',' ',$titre_page); 
			$page_a_inclure=$filename;
		}
		else{
			$titre_page='Accueil';
			$page_a_inclure='controleurs/accueil.inc.php';
		}
	}
	else{
		$titre_page='Accueil';
		$page_a_inclure='controleurs/accueil.inc.php';
	}
}
else{
	$titre_page='Accueil';
	$page_a_inclure='controleurs/accueil.inc.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
	<title><?php echo NOM_SITE.' | '.$titre_page;?></title>
	<!-- Style CSS -->
	<link rel="stylesheet" media="screen" type="text/css" title="style" href="vues/includes/style.css" />
	<link rel="stylesheet" media="screen" type="text/css" title="style" href="modeles/js/library/lightbox2.04/css/lightbox.css" />
	<!-- Auteur de la page -->
	<meta name="author" content="<?php echo AUTEUR_SITE;?>" />
	<!-- Description de la page -->
	<meta name="description" content="<?php echo DESCRIPTION_SITE;?>" />
	<!-- Mots-clés de la page -->
	<meta name="keywords" content="<?php echo MOTS_CLES_SITE;?>" />
	<!-- Empêcher la mise en cache de la page par le navigateur -->
	<meta http-equiv="pragma" content="no-cache" />
	<!-- Table de caractères -->
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
	
	<!-- GOOGLE ANALYTICS-->
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-10608157-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>
</head>
<body>
	<?php include_once('vues/includes/haut.php');?>
	<div id="page">
		<?php include_once($page_a_inclure);?>
	</div>
	<?php include_once('vues/includes/footer.html');?>
</body>
</html>