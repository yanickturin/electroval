function bb_code_image(id_textarea,lien_image,id_cache){
	var champ=document.getElementById(id_textarea);
	champ.focus();
	champ.value+="[image]"+lien_image+"[/image]";
	document.getElementById(id_cache).style.display = 'none';
}
function addDir(id_input,adresseDir,id_cache){
	var champ = document.getElementById(id_input);
	champ.value=adresseDir;
	document.getElementById(id_cache).style.display = 'none';
}
function bb_code_lien(id_textarea){
	var champ=document.getElementById(id_textarea);
	champ.focus();
	var expression_reguliere=/^http:\/\/{1}/i;
	var lien_url=prompt("Veuillez entrer l'url de votre lien.","http://");
	if(lien_url){
		if(expression_reguliere.test(lien_url)){
			var lien_nom=prompt("Veuillez entrer le nom de votre lien.");
			if(lien_nom){
				champ.value+="[lien url="+lien_url+"]"+lien_nom+"[/lien]";
			}
		}
		else{
			alert("Votre url doit commencer par http://.");
			bb_code_lien(id_textarea);
		}

	}
	else{
		if(lien_url!=null){
			alert("Vous n'avez pas entré l'url.");
			bb_code_lien(id_textarea);
		}
	}
}
function add_balises(balise,id_textarea){
	var champ=document.getElementById(id_textarea);
	champ.focus();
	//On récupere le texte sélectionné (s'il y en a un)
	if(champ.setSelectionRange){//Mozilla Firefox
		var selection=champ.value.substring(champ.selectionStart, champ.selectionEnd);
	}
	else if(document.selection){//IE
		var range = document.selection.createRange();
		var selection = range.text;
	}
	//Ensuite on ajoute le BBcode
	if (champ.createTextRange && champ.caretPos) { // si c'est IE
		range.text = "[" + balise + "]" + selection + "[/" + balise + "]";
		var LongueurBaliseFin=balise.length+3;
		var LongueurDeuxBalises=balise.length+balise.length+5;
		var LongueurBalisesEtSelection=LongueurDeuxBalises+selection.length;
		if (selection.length == 0){
			range.move('character', -LongueurBaliseFin);
		}
		else{
			range.moveStart('character',LongueurBalisesEtSelection);
		}
		range.select();
	}
	else if (champ.selectionStart || champ.selectionStart == 0){// si on a un navigateur qui connait selectionStart (Mozilla)
		var LongueurChamp = champ.textLength;
		var DebutSelection = champ.selectionStart;
		var FinSelection = champ.selectionEnd;
		var s1 = (champ.value).substring(0,DebutSelection); //On récupère la chaîne de caractère se trouvant entre 0 et le début de la sélection
		var s3 = (champ.value).substring(FinSelection, LongueurChamp);//On récupère la chaîne de caractère se trouvant entre la fin de la sélection et la longueur du texte
		champ.value = s1 + "["+balise+"]"+selection+"[/"+balise+"]" + s3;
		if (selection.length == 0){
			var position = DebutSelection + balise.length + 2;//Si on n'avait rien sélectionner on place le curseur entre les deux balises, c'est à dire à la place ou se trouvait le curseur + la longueur de la balise ajouté + 2 pour < et >
		}
		else{
			var position = DebutSelection +balise.length + selection.length + balise.length+5;
		}
		champ.selectionStart=position;
		champ.selectionEnd=position;
	}
	else{ // sinon, on met à la fin
		champ.value += "["+balise+"]"+selection+"[/"+balise+"]";
   }
}
function storeCaret(textEl) {
   if (textEl.createTextRange) textEl.caretPos = document.selection.createRange().duplicate();
}
//Prévisualitation
/* Après quelques recherches, j'ai fini par découvrir ce que signifiait String.fromCharCode(5,6,7)  : c'est une chaînes de caractères composée de trois caractères non imprimables ENQ - Inquire, ACK - Acknowledge et Bell - cloche. La succession accidentelle de ces 3 caractères dans un textarea est proche de 0, voire impossible. Dans le script, on se sert de ptag pour remplacer les retours à la ligne (\n) qui serviront dans les fonctions deblaie() et remblaie(), puis on rétablit les \n avant de les transformer en <br />.
Il doit surement y avoir une raison à ce comportement (liée à l'utilisation des RegEx ?) qui empêche le remplacement direct des \n en <br />, mais je ne m'y connais pas assez pour la connaitre :( . Si quelqu'un connait cette raison, qu'il n'hésite pas :D .

Les différentes fonctions que tu as rapportées ici servent à suivre le comportement décrit ci-dessus, shématiquement cela donne ceci :

   1. Remplacement des \n par ptag (nl2khol)
   2. ajouter un \n après les balises de fermeture du BBcode (deblaie)
   3. remplacer les balises BBcode par leur équivalent HTML (remplace_tag)
   4. supprimer \n (remblaie)
   5. Rétablissement des \n à partir des ptag (unkhol)
   6. Remplacement des \n par <br /> (nl2br) 
   -> aide par Darkodam */
var timer=0;
var ptag=String.fromCharCode(5,6,7);
function  previsualisation() {
	t=document.getElementById("texte").value;
	t=code_to_html(t);
	if (document.getElementById) document.getElementById("prev").innerHTML=t;
	//if (document.getElementById("auto").checked) timer=setTimeout(previsualisation,1);
	//Le "1" est le temps que met le texte à s'afficher, "1" : le texte s'affichera en même temps que l'on écrit (en s)
}
function automatique(){
	if (document.getElementById("auto").checked) previsualisation();// si on a coché la case d'aperçu automatique 
}
function code_to_html(t){
	t=nl2khol(t);
	// balise Gras on lui dit que telle balise correspond à tel code en HTML
	t=deblaie(/(\[\/bold\])/g,t);
	t=remplace_tag(/\[bold\](.+)\[\/bold\]/g,'<span class="bold">$1</span>',t);
	t=remblaie(t);
 
	// balise Italic
	t=deblaie(/(\[\/italique\])/g,t);
	t=remplace_tag(/\[italique\](.+)\[\/italique\]/g,'<span class="italique">$1</span>',t) ;
	t=remblaie(t);
 
	// balise souligner
	t=deblaie(/(\[\/souligne\])/g,t);
	t=remplace_tag(/\[souligne\](.+)\[\/souligne\]/g,'<u>$1</u>',t),
	t=remblaie(t);
	
	// balise droite
	t=deblaie(/(\[\/droite\])/g,t);
	t=remplace_tag(/\[droite\](.+)\[\/droite\]/g,'<p class="droite">$1</p>',t);
	t=remblaie(t);
 
	// balise centrer
	t=deblaie(/(\[\/centre\])/g,t);
	t=remplace_tag(/\[centre\](.+)\[\/centre\]/g,'<p class="centre">$1</p>',t);
	t=remblaie(t);
	
	// balise gauche
	t=deblaie(/(\[\/gauche\])/g,t);
	t=remplace_tag(/\[gauche\](.+)\[\/gauche\]/g,'<p class="gauche">$1</p>',t);
	t=remblaie(t);
	
	// balise image
	t=deblaie(/(\[\/image\])/g,t);
	t=remplace_tag(/\[image\](.+)\[\/image\]/g,'<img src="$1" height="150px" alt="" />',t);
	t=remblaie(t);
	
	// balise lien
	t=deblaie(/(\[\/lien url=(.+)\])/g,t);
	t=remplace_tag(/\[lien url=(.+)\](.+)\[\/lien\]/g,'<a href="$1">$2</a>',t);
	t=remblaie(t);
 
	t=unkhol(t);
	t=nl2br(t);
	return t;
}
//tout le code qui suit, c'est pour transformer toutes les balises, comme les preg_replace en PHP
function deblaie(reg,t) {
	textarea=new String(t);
	return textarea.replace(reg,'$1\n');
}
function remblaie(t) {
	textarea=new String(t);
	return textarea.replace(/\n/g,'');
}
function remplace_tag(reg,rep,t) {
	textarea=new String(t);
	return textarea.replace(reg,rep);
}
function nl2br(t) {
	textarea=new String(t);
	return textarea.replace(/\n/g,'<br/>');
}
function nl2khol(t) {
	textarea=new String(t);
	return textarea.replace(/\n/g,ptag);
}
function unkhol(t) {
	textarea=new String(t);
	return textarea.replace(new RegExp(ptag,'g'),'\n');
}
