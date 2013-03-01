<div id="haut">	
<div id="header_image">
	<p>
		<a href="admin.html">Administration</a> | <a href="interne.html">Interne</a> | <a href="contact.html">Contact</a>
	</p>
	
	</div>
	<div id="header_menu">
		<ul id="onglet">
			<li><a href="accueil.html" id="tab_accueil" <?php if(isset($page)){if('tab_accueil'=='tab_'.$page){ echo 'class="active"';}}?>>Accueil</a></li>
			<li><a href="societe.html" id="tab_societe" <?php if(isset($page)){if('tab_societe'=='tab_'.$page){ echo 'class="active"';}}?>>Soci&eacute;t&eacute;</a></li>
			<li><a href="electromenager.html" id="tab_electromenager" <?php if(isset($page)){if('tab_electromenager'=='tab_'.$page){ echo 'class="active"';}}?>>Electrom&eacute;nager</a></li>
			<li><a href="bonnes_affaires.html" id="tab_bonnes_affaires" <?php if(isset($page)){if('tab_bonnes_affaires'=='tab_'.$page){ echo 'class="active"';}}?>>Bonnes affaires</a></li>
			<li><a href="references.html" id="tab_references" <?php if(isset($page)){if('tab_references'=='tab_'.$page){ echo 'class="active"';}}?>>R&eacute;f&eacute;rences</a></li>
			<li><a href="partenaires.html" id="tab_partenaires" <?php if(isset($page)){if('tab_partenaires'=='tab_'.$page){ echo 'class="active"';}}?>>Partenaires</a></li>
		</ul>
	</div>
</div>