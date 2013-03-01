window.onload=clique;
function clique(){
	var elements = document.getElementsByName('supprimer');
	for (i=0; i < elements.length; i++){
        elements[i].onclick = avertissement;
    }
}

function avertissement(){
        if(confirm("Etes-vous sûr de vouloir supprimer ceci?")){
                return true;
        }
        else{
                return false;
        }
}