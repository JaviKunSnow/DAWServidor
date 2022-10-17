let lista = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", 
    "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

let i = 0;



function añadirMeses(){
    const ul = document.getElementById("listaMeses");
    const li = document.createElement("li");
    li.appendChild(document.createTextNode(lista[i]));
    ul.appendChild(li);
    i++;
    if(i == 12){
        document.getElementById("boton1").style.display = "none";
        document.getElementById("quitar").style.display = "block";
    }
}


function quitarMeses(){
    ul.removeChild(ul.lastChild);
    i--;
    if(i == 0){
        document.getElementById("quitar").style.display = "none";
        document.getElementById("boton1").style.display = "block";
    }
}

añadirMeses();
quitarMeses();



