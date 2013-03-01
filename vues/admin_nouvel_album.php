<script type="text/Javascript" src="modeles/js/bb_code.js"></script>
<script type="text/Javascript" src="modeles/js/js.js"></script>
<!--*********************************************
	Blocs cachés
********************************************* -->
<div id="affiche_images">
	<div class="pop_up_barre">
		<div class="pop_up_fermer"><a href="javascript:cache('affiche_images');">Fermer</a></div>
		Insérez une image en cliquant dessus
	</div>
	<div class="racine_arbo">
	<?php
		echo $affichage_arbo;
	?>
	</div>
</div>
<div id="affiche_dossiers">
	<div class="pop_up_barre">
		<div class="pop_up_fermer"><a href="javascript:cache('affiche_dossiers');">Fermer</a></div>
		Choisir un dossier pour son album
	</div>
	<div class="racine_arbo">
	<p>Choisissez un dossier pour votre album en cliquant sur l'icône vert.</p><br />
	<?php
		echo $affichage_arboOnlyDir;
	?>
	</div>
</div>
<div id="affiche_prev">
	<div class="pop_up_barre">
		<div class="pop_up_fermer"><a href="javascript:cache('affiche_prev');">Fermer</a></div>
		Prévisualitation de la news
	</div>
	<div class="cadre_prev" id="prev"></div>
</div>
<!--*********************************************
	Fin des blocs cachés
********************************************* -->
<?php
	include('vues/includes/menu_gauche_admin.html');
?>
<div id="content">
	<div id="style_form" class="formulaire">
		<h1>Formulaire pour la gestion des albums photos</h1>
		<p id="info_form">Ce formulaire vous est utile pour l'ajout ou la modification d'un album photos</p>
		<p>
			<?php
				include_once('vues/includes/bb_code.html');
			?>
		</p><br />
		<form action="admin_galerie.html" method="post">
			<p>
				<input type="hidden" name="id_news_modif" value="<?php echo $id;?>" />
				<label for="titre">Titre de l'album<span class="small">Indiquez le titre de votre album</span></label>
				<input type="text" id="titre" name="titre" value="<?php echo $titre;?>"/><br /><br />
				<label for="dossier">Emplacement du dossier<span class="small"><a href="javascript:montre('affiche_dossiers');">Indiquez le dossier contenant les photos pour votre album</a></span></label>
				<input type="text" id="dossier" name="dossier" value="<?php echo $dossier;?>"/><br /><br />
				<label for="texte">Descriptif de l'album<span class="small">Indiquez le descriptif de votre album</span></label>
				<textarea id="texte" rows="10" cols="80" name="texte" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);"><?php echo $texte;?></textarea><br /><br /><br />
			</p>
			<p>
				<input class="bouton" type="submit" value="Valider" /> <input class="bouton" type="button" value="Prévisualiser" onclick="montre('affiche_prev');previsualisation();return(false);" />
			</p>
		<div class="spacer"></div>
		</form>
	</div>
</div>