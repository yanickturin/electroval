function deplie(elementid){
	element=document.getElementById(elementid);
	if(element.style.display=='block'){
		document.getElementById(elementid).style.display = 'none';
	}
	else{
		document.getElementById(elementid).style.display = 'block';
	}
}
function montre(elementid) {
	document.getElementById(elementid).style.display = 'block';
}
function montre_modif(elementid,id_modif) {
	document.getElementById(elementid).style.display = 'block';
	document.getElementById('id_modif').value = id_modif;
}
function cache(elementid) {
	document.getElementById(elementid).style.display = 'none';
}
function desactive(elementid,elementid2,elementid3,elementid4){
	if(document.getElementById(elementid).disabled==true){
		document.getElementById(elementid).disabled = false;
	}
	else{
		document.getElementById(elementid).disabled = true;
		document.getElementById(elementid2).disabled = false;
		document.getElementById(elementid3).checked = false;
	}
}