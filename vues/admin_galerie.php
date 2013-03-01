<script type="text/Javascript" src="modeles/js/suppression.js"></script>
<script type="text/Javascript" src="modeles/js/js.js"></script>
<?php
	include('vues/includes/menu_gauche_admin.html');
?>
<div id="content">
	<div id="style_form" class="formulaire">
		<h1>Administration des albums photos</h1>
		<p id="info_form">Ajouter ou modifier vos albums photos</p>
		<a href="admin_nouvel_album.html">
			<img src="vues/images/icones/page_add.png" alt="" class="vertical_align" />
			Ajouter un album
		</a><br />
			<?php
			if($message_admin!=NULL){
				echo $message_admin;
			}
			?>
	</div>
</div>