<!-- Auteur : frederic.nicod fnicod@bluewin.ch
function fait_Array(n) {
  this.length = n;
  return this;
}

aMois = new fait_Array(12);
aMois[1] = "janvier";
aMois[2] = "février";
aMois[3] = "mars";
aMois[4] = "avril";
aMois[5] = "mai";
aMois[6] = "juin";
aMois[7] = "juillet";
aMois[8] = "août";
aMois[9] = "septembre";
aMois[10] = "octobre";
aMois[11] = "novembre";
aMois[12] = "décembre";

aJours = new fait_Array(7);
aJours[1] = "Dimanche";
aJours[2] = "Lundi";
aJours[3] = "Mardi";
aJours[4] = "Mercredi";
aJours[5] = "Jeudi";
aJours[6] = "Vendredi";
aJours[7] = "Samedi";

function date_long(nDate) {
  var nEr = nDate.getDate();
  if (nEr == 1) nEr += "er";
  var nJour = aJours[nDate.getDay() + 1];
  var nMois = aMois[nDate.getMonth() + 1];
  var nAnnee = nDate.getYear();
  if (nAnnee < 100) nAnnee += 2000;
  if (nAnnee > 100&&nAnnee < 2000) nAnnee += 1900;
  return nMois + " " + nEr + " ";
}

//-->


