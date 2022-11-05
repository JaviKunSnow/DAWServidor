 let lista = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", 
    "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

let i = 0;

const ul = document.getElementById("listaMeses");

function addMeses(){
    const li = document.createElement("li");
    li.appendChild(document.createTextNode(lista[i]));
    ul.appendChild(li);
    i++;
    if(i == 12){
        document.getElementById("boton1").style.display = "none";
        document.getElementById("quitar").style.display = "block";
        document.getElementById("boton2").style.backgroundColor = "#893EFF";
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

let verde=0;
let rojo=0;

let botrojo = document.getElementById("brojo");
botrojo.appendChild(document.createTextNode(rojo));

let botverde = document.getElementById("bverde");
botverde.appendChild(document.createTextNode(verde));
console.log(botrojo);

function botonRojo(){
    botrojo.innerHTML++;
}

function botonVerde(){
    botverde.innerHTML++;
}

