

var buttons ;

function add(){

   
    var nom = document.getElementById("nom");
    var puissance = document.getElementById("puissance");
    var nombre = document.getElementById("nombre");
    var temps = document.getElementById("temps");
    var tbody = document.getElementById('tbody');

     if(nom.value == "" || puissance.value == "" || nombre.value == "" || temps.value =="" ){
        return alert('Veuillez remlir tous les champs');
    }else{ 
    var newtr = document.createElement("tr");
    var newth = document.createElement("th");
    var newtd1 = document.createElement("td");
    var newtd2 = document.createElement("td");
    var newtd3 = document.createElement("td");
    var newtd4 = document.createElement("td");
    var newtd5 = document.createElement("td");
    var button1 = document.createElement("button");
    var button2 = document.createElement("button");
if(tbody.childElementCount >= 1){
    let theid = tbody.lastElementChild.id ;
    let lenght = parseInt(theid.length)-1 ;
    var id = theid.slice(0,lenght);
}else{
    var id = 0;

}

    id = parseInt(id) + 1;
    newtr.setAttribute("id", id+"1");
    newth.setAttribute("id", id+"2");
    newtd1.setAttribute("id", id+"3");
    newtd2.setAttribute("id", id+"4");
    newtd3.setAttribute("id", id+"5");
    newtd4.setAttribute("id", id+"6");
    newtd5.setAttribute("id", id+"7");
    button1.className= 'btn btn-info';
    button2.className= 'btn btn-danger';
    button2.onclick = function(e) {e.target.closest("tr").remove()};
    newtd4.appendChild(button1);
    newtd5.appendChild(button2);
    newtr.appendChild(newth);
    newtr.appendChild(newtd1);
    newtr.appendChild(newtd2);
    newtr.appendChild(newtd3);
    newtr.appendChild(newtd5);

    var nomtableau = document.createTextNode(nom.value);
    var puissancetableau = document.createTextNode(puissance.value);
    var nombretableau = document.createTextNode(nombre.value);
    var tempstableau = document.createTextNode(temps.value);
    var button2tableau = document.createTextNode("Supprimer");

    newth.appendChild(nomtableau);
    newtd1.appendChild(puissancetableau);
    newtd2.appendChild(nombretableau);
    newtd3.appendChild(tempstableau);
    button2.appendChild(button2tableau);

    tbody.appendChild(newtr);
    nom.value=""
    puissance.value=""
    nombre.value=""
    temps.value=""
    }


}


function estimate(){
    noms = document.querySelectorAll("[id$='2']");
    puissances = document.querySelectorAll("[id$='3']");
    nombres = document.querySelectorAll("[id$='4']");
    tempss = document.querySelectorAll("[id$='5']");
    var n = noms.length;
    let somme = 0;
for(var i =0 ; i<n;i++){
        somme = somme + parseInt(puissances[i].textContent)*parseInt(nombres[i].textContent)*parseInt(tempss[i].textContent)
}
 somme = somme /1000 *30;

if(somme < 101){
    totale = parseInt(somme * 0.9010);

}
else if(somme >= 101 && somme<151){
    totale = parseInt(100 * 0.9010 + (somme - 100)* 1.0732);

}else if(somme >= 151 && somme<201){
    totale = parseInt(somme * 1.0732);

}else if(somme >= 201 && somme < 301){
    totale = parseInt(somme * 1.1676);

}else if(somme >=301 && somme < 501){
    totale = parseInt(somme *  1.3817);
	            
}else{
    totale = parseInt(somme *  1.5958);

}
alert("votre consommation mensuelle estimée est "+ somme+" KW , avec un prix qui vaut "+totale+"DH .")

}

