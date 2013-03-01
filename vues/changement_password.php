<?php
	include('vues/includes/menu_gauche_admin.html');
?>
<div id="content">
	<div id="style_form" class="formulaire">
		<h1>Changement de mot de passe</h1>
		<p id="info_form">Veuillez remplir le formulaire ci-dessous pour changer votre mot de passe.</p>
		<?php echo $message.'<br />';?>
		<form action="changement_password.html" method="post">
			<p>
				<label for="password_actuel">Ancien mot de passe:</label>
				<input type="password" name="password_actuel" id="password_actuel"/>
			</p>
			<p>
				<label for="nouveau_password">Nouveau mot de passe:</label>
				<input type="password" name="nouveau_password" id="nouveau_password" />
			</p>
			<p>
				<label for="nouveau_password_retaper">Confirmation mot de passe:</label>
				<input type="password" name="nouveau_password_retaper" id="nouveau_password_retaper" />
			</p>
			<p>
				<input class="bouton" type="submit" value="Valider" />
			</p>
			<div class="spacer"></div>
		</form>
	</div>
</div>