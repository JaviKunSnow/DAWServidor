let lista = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", 
    "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

let i = 0;

function añadirMeses(){
    const ul = document.getElementById("listaMeses");
    const li = document.createElement("li");
    li.appendChild(document.createTextNode(lista[i]));
    ul.appendChild(li);
    i++;
}

añadirMeses();