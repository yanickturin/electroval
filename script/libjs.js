<!-- Auteur : frederic.nicod fnicod@bluewin.ch

var ns4 = (document.layers)?true:false;
var ie4 = (document.all)?true:false;
var dom = (document.getElementById)?true:false;

//Affichage calque
function show(divId) {
  if (dom) {
	document.getElementById(divId).style.display = "inline";
  }
  else if (ie4) {
	document.all[divId].style.display = "inline";
  }
  else if (ns4) {
	document.layers[divId].display = "inline";
  }
}

function hide(divId) {
  if (dom) {
	document.getElementById(divId).style.display = "none";
  }
  else if (ie4) {
	document.all[divId].style.display = "none";
  }
  else if (ns4) {
	document.layers[divId].display = "none";
  }
}


function showhide(divId) {
  if (dom) {
    if (document.getElementById(divId).style.display == "inline") {
	  document.getElementById(divId).style.display = "none";
	}
	else {
	  document.getElementById(divId).style.display = "inline";
	}
  }
  else if (ie4) {
	if (document.all[divId].style.display == "inline") {
	  document.all[divId].style.display = "none";
	}
	else {
	  document.all[divId].style.display = "inline"
	}
  }
  else if (ns4) {
	if (document.layers[divId].display == "inline") {
	  document.layers[divId].display = "none";
	}
	else {
	  document.layers[divId].display = "inline";
	}
  }
}


//-->


