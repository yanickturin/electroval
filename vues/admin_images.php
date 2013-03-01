<script type="text/Javascript" src="modeles/js/suppression.js"></script>
<script type="text/Javascript" src="modeles/js/js.js"></script>
<!--*********************************************
	Blocs cachés
********************************************* -->
<div id="ajout_dossier">
	<div class="pop_up_barre">
		<div class="pop_up_fermer"><a href="#" onclick="cache('ajout_dossier');">Fermer</a></div>
		Ajout d'un dossier
	</div>
	<form method="post" action="index.php?page=admin_images&amp;repertoire=<?php echo $dir;?>">
		<p><input type="hidden" name="dir" value="<?php echo $dir;?>" /></p>
		<p><label for="dossier">Nouveau dossier</label>: <input type="text" id="dossier" name="dossier" /> <input type="submit" value="Valider" /></p>
	</form>
</div>
<div id="ajout_image">
	<div class="pop_up_barre">
		<div class="pop_up_fermer"><a href="#" onclick="cache('ajout_image');">Fermer</a></div>
		Ajout d'une image
	</div>
	<form enctype="multipart/form-data" method="post" action="index.php?page=admin_images&amp;repertoire=<?php echo $dir;?>">
		<p><input type="hidden" name="dir" value="<?php echo $dir;?>" /></p>
		<p><label for="image">Chemin de l'image</label>: <input type="file" id="image" name="image" /> <input type="submit" value="Valider" onclick="this.value='Upload en cours...';" /></p>
	</form>
</div>
<!--<div id="ajout_zip">
	<div class="pop_up_barre">
		<div class="pop_up_fermer"><a href="#" onclick="cache('ajout_zip');">Fermer</a></div>
		Ajout d'un zip
	</div>
	<form enctype="multipart/form-data" method="post" action="index.php?page=admin_images&amp;repertoire=<?php echo $dir;?>">
		<p><input type="hidden" name="dir" value="<?php echo $dir;?>" /></p>
		<p><label for="zip">Chemin du fichier zip</label>: <input type="file" id="zip" name="zip" /> <input type="submit" value="Valider" onclick="this.value='Upload en cours...';" /></p>
	</form>
</div>-->
<div id="modif_image">
	<div class="pop_up_barre">
		<div class="pop_up_fermer"><a href="#" onclick="cache('modif_image');">Fermer</a></div>
		Redimensionnement de l'image
	</div>
	<form method="post" action="index.php?page=admin_images&amp;repertoire=<?php echo $dir;?>">
		<p>
			<input type="hidden" id="id_modif" name="id_modif" />
			<label for="prop_largeur">Redimensionner proportionnellement à la largeur</label>: <input type="checkbox" name="prop_largeur" id="prop_largeur" onclick="desactive('hauteur','largeur','prop_hauteur','prop_largeur');" /><br /><br />
			<label for="prop_hauteur">Redimensionner proportionnellement à la hauteur</label>: <input type="checkbox" name="prop_hauteur" id="prop_hauteur" onclick="desactive('largeur','hauteur','prop_largeur','prop_hauteur');" /><br /><br />
			<label for="largeur">Largeur image</label>: <input type="text" id="largeur" name="largeur" /><br /><br />
			<label for="hauteur">Hauteur image</label>: <input type="text" id="hauteur" name="hauteur" /><br /><br />
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
		<h1>Gestion des images</h1>
		<p id="info_form">Cette page sert à ajouter, modifier ou supprimer des images se trouvant sur le serveur.</p>
		<p class="fil_ariane">Vous êtes ici -> <?php echo $dir;?></p><br />
		<a href="#" onclick="montre('ajout_dossier');">
			<img src="vues/images/icones/folder_add.png" alt="" class="vertical_align" />
			Ajouter un dossier
		</a><br />
		<a href="#" onclick="montre('ajout_image');">
			<img src="vues/images/icones/image_add.png" alt="" class="vertical_align" />
			Ajouter une image (au max. <?php echo ini_get('upload_max_filesize');?>)
		</a><br />
		<!--<a href="#" onclick="montre('ajout_zip');">
			<img src="vues/images/icones/folder_image.png" alt="" class="vertical_align" />
			Ajouter un fichier zip contenant des images (au max. <?php echo ini_get('upload_max_filesize');?>)
		</a><br />-->
		<a href="<?php echo $dir_precedent;?>">
			<img src="vues/images/icones/previous.png" alt="" class="vertical_align" />
			Dossier précédent
		</a><br /><br />
		<?php
		// Si l'on a un message à afficher, on l'affiche
		if($message_admin!=NULL){
			echo $message_admin.'<br />';
		}
		// On affiche les dossiers
		for($i=0;$i<$nombre_entrees_dossier;$i++){
			echo 	'<img src="vues/images/icones/'.$type[$i].'.png" alt="" class="vertical_align" />
					<a href="index.php?page=admin_images&amp;repertoire='.$adresse[$i].'">'.$nom[$i].'</a>
					<a class="info" name="supprimer" href="index.php?page=admin_images&amp;supprimer_d='.$adresse[$i].'&amp;repertoire='.$dir.'">
						<img src="vues/images/icones/delete.png" alt="" class="vertical_align" />
						<span>Supprimer le dossier</span>
					</a><br />';
		}
		// On affiche les images
		for($i=0;$i<$nombre_entrees_fichier;$i++){
			echo 	'<span class="info">
						<img src="vues/images/icones/'.$type_fichier[$i].'.png" alt="" class="vertical_align"  />
						<span>
							<img src="'.ADRESSE_SITE.'/'.$adresse_fichier[$i].'" width="'.$largeur_miniature[$i].'" height="'.$hauteur_miniature[$i].'" alt="" />
						</span>
					</span>
					<a href="'.ADRESSE_SITE.'/'.$adresse_fichier[$i].'">'.$nom_fichier[$i].'</a>
					<a class="info" name="supprimer" href="index.php?page=admin_images&amp;supprimer_f='.$adresse_fichier[$i].'&amp;repertoire='.$dir.'">
						<img src="vues/images/icones/delete.png" alt="" class="vertical_align" />
						<span>Supprimer l\'image</span>
					</a>
					<a class="info" href="#" onclick="montre_modif(\'modif_image\',\''.$adresse_fichier[$i].'\');">
						<img src="vues/images/icones/image_edit.png" alt="" class="vertical_align" />
						<span>Modifier l\'image</span>
					</a>
					<span class="info">
						<img src="vues/images/icones/information.png" alt="" class="vertical_align" />
						<span>
							Poids: '.$poids_fichier[$i].'<br />
							Dimensions: '.$largeur[$i].' x '.$hauteur[$i].'
						</span>
					</span><br />';
		}
		?>
	</div>
</div>