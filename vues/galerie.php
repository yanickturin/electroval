<div id="menu_gauche">
	<ul id="liens_menu_gauche">
		<li><a href="interne.html">Accueil interne</a></li>
		<li><a href="galerie.html">Galerie photos</a></li>
		<li><a href="index.php?page=connexion_interne&amp;deconnexion=1">Déconnexion</a></li>
	</ul>
</div>	
<div id="content">
	<h1 class="underline">Galerie photos</h1><br />
	<div class="contenu">
		<?php echo $contenu;?>
	</div>
</div>
<!-- Librairie javscript Lightbox2.04 pour les images -->
<script type="text/javascript" src="modeles/js/library/lightbox2.04/js/prototype.js"></script>
<script type="text/javascript" src="modeles/js/library/lightbox2.04/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="modeles/js/library/lightbox2.04/js/lightbox.js"></script>
<!-- Fin de l'inclusion des fichiers de la libraire -->