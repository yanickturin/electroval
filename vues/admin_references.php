<script type="text/Javascript" src="modeles/js/suppression.js"></script>
<script type="text/Javascript" src="modeles/js/js.js"></script>
<!--*********************************************
	Blocs cachés
********************************************* -->
<div id="edit_annee">
	<div class="pop_up_barre">
		<div class="pop_up_fermer"><a href="javascript:cache('edit_annee');">Fermer</a></div>
	</div>
	<form action="admin_references.html" method="post">
	<p><input type="hidden" id="id_modif" name="id_modif" /></p>
	<p>
		<label for="annee_edit_ref">Année de la référence</label>
		<input type="text" name="annee_edit_ref" id="annee_edit_ref" />
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
		<h1>Administration des références</h1>
		<p id="info_form">Ajouter ou modifier vos références</p>
		<a href="admin_nouvelle_reference.html">
			<img src="vues/images/icones/page_add.png" alt="" class="vertical_align" />
			Ajouter une référence
		</a><br /><br />
			<?php
			// Si l'on a un message à afficher, on l'affiche
			if($message_admin!=NULL){
				echo $message_admin;
			}
			?>
	</div>
</div>
