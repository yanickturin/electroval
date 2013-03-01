<script type="text/Javascript" src="modeles/js/bb_code.js"></script>
<script type="text/Javascript" src="modeles/js/js.js"></script>
<!--*********************************************
	Blocs cach�s
********************************************* -->
<div id="affiche_images">
	<div class="pop_up_barre">
		<div class="pop_up_fermer"><a href="javascript:cache('affiche_images');">Fermer</a></div>
		Ins�rez une image en cliquant dessus
	</div>
	<div class="racine_arbo">
	<?php
		echo $affichage_arbo;
	?>
	</div>
</div>
<div id="affiche_prev">
	<div class="pop_up_barre">
		<div class="pop_up_fermer"><a href="javascript:cache('affiche_prev');">Fermer</a></div>
		Pr�visualitation de la bonne affaire
	</div>
	<div class="cadre_prev" id="prev"></div>
</div>
<!--*********************************************
	Fin des blocs cach�s
********************************************* -->
<?php
	include('vues/includes/menu_gauche_admin.html');
?>
<div id="content">
	<div id="style_form" class="formulaire">
		<h1>Formulaire pour la gestion des bonnes affaires</h1>
		<p id="info_form">Ce formulaire vous est utile pour l'ajout ou la modification d'une bonne affaire</p>
		<p>
			<?php
				include_once('vues/includes/bb_code.html');
			?>
		</p><br />
		<form action="admin_bonnes_affaires.html" method="post">
			<p>
				<input type="hidden" name="id_ba_modif" value="<?php echo $id;?>" />
				<!--<label for="auto">Pr�visualisation automatique<span class="small">Cochez la case si vous voulez activer la pr�visualisation sous le formulaire.</span></label> <input name="auto" class="checkbox" id="auto" type="checkbox" onclick="automatique()" /><br /><br /><br /><br /> -->
			
				<label for="titre">Titre de la bonne affaire<span class="small">Indiquez le titre de votre b.a.</span></label>
				<input type="text" id="titre" name="titre" value="<?php echo $titre;?>"/><br /><br />
			
				<label>Cat�gorie de la bonne affaire<span class="small">Indiquez la cat�gorie de votre b.a.</span></label>
				<?php echo $liste_categorie;?><br /><br /><br />

				<label for="texte">Descriptif de la bonne affaire<span class="small">Indiquez le contenu de votre b.a.</span></label>
				<textarea id="texte" rows="10" cols="80" name="texte" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);"><?php echo $texte;?></textarea><br /><br /><br />
			</p>
			<p>
				<input class="bouton" type="submit" value="Valider" /> <input class="bouton" type="button" value="Pr�visualiser" onclick="montre('affiche_prev');previsualisation();return(false);" />
			</p>
		<div class="spacer"></div>
		</form>
	</div>
</div>