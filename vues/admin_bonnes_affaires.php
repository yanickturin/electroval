<script type="text/Javascript" src="modeles/js/suppression.js"></script>
<script type="text/Javascript" src="modeles/js/js.js"></script>
<!--*********************************************
	Blocs cachés
********************************************* -->
<div id="add_categorie">
	<div class="pop_up_barre">
		<div class="pop_up_fermer"><a href="javascript:cache('add_categorie');">Fermer</a></div>
	</div>
	<form action="admin_bonnes_affaires.html" method="post">
	<p>
		<label for="add_cat">Nom de la catégorie: </label>
		<input type="text" name="add_cat" id="add_cat" />
		<input type="hidden" name="id_modif" id="id_modif" />
		<input type="submit" value="Valider" />
	</p>
	</form>
</div>
<!--*********************************************
	Fin des blocs cachés
********************************************* -->
<?php
	include('vues/includes/menu_gauche_admin.html');
?>
<div id="content">
	<div id="style_form" class="formulaire">
		<h1>Administration des bonnes affaires</h1>
		<p id="info_form">Ajouter ou modifier vos bonnes affaires</p>
		<a href="admin_nouvelle_bonne_affaire.html">
			<img src="vues/images/icones/page_add.png" alt="" class="vertical_align" />
			Ajouter une bonne affaire
		</a><br />
		<a href="javascript:montre('add_categorie');">
			<img src="vues/images/icones/categorie_add.png" alt="" class="vertical_align" />
			Ajouter une catégorie
		</a><br /><br />
			<?php
			if($message_admin!=NULL){
				echo $message_admin;
			}
			?>
	</div>
</div>