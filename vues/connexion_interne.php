<div id="menu_gauche">
</div>
<div id="content">
	<div id="style_form" class="formulaire">
		<h1>Connexion</h1>
		<p id="info_form">Connectez-vous afin d'accéder à la partie la galerie photos interne.</p>
		<p>Cette page est accessible exclusivement aux employés d'Electroval.</p><br />
		<?php echo $message_connexion.'<br /><br />';
		if($is_connecte==0){
		?>
			<form action="connexion_interne.html" method="post">
			<p>
				<label for="login">Login<span class="small">Entrez votre login</span></label><input type="text" name="login" id="login" /><br /><br />
				<label for="password">Mot de passe<span class="small">Entrez votre mot de passe</span></label><input type="password" name="password" id="password" /><br /><br />
				<input type="submit" class="bouton" value="Connexion" />
			</p>
			</form>
			<noscript><p class="erreur">Votre navigateur ne supporte pas le javascript, veuillez faire une mise à jour de celui-ci, ou activez le javascript.</p></noscript>
		<?php
		}
		?>
	</div>
</div>