document.querySelector("html").style.backgroundColor = "lightblue";

let div = document.createElement("div");
div.setAttribute("style", "display: flex; justify-content: center;");

div.appendChild(document.getElementById("idCiudades"));
div.appendChild(document.getElementById("idHabitantes"));
document.body.appendChild(div);

let div2 = document.createElement("div");
div2.setAttribute("style", "display: flex; justify-content: center;");

let check1 = document.createElement("input");
let labelcheck1 = document.createElement("label");
labelcheck1.appendChild(document.createTextNode("Sin ordenar"));
labelcheck1.style.color = "blue";

let check2 = document.createElement("input");
let labelcheck2 = document.createElement("label");
labelcheck2.appendChild(document.createTextNode("Por nombre"));
labelcheck2.style.color = "blue";

let check3 = document.createElement("input");
let labelcheck3 = document.createElement("label");
labelcheck3.appendChild(document.createTextNode("Por Habitantes"));
labelcheck3.style.color = "blue";

check1.setAttribute("type", "radio");
check1.setAttribute("id", "check1");
check2.setAttribute("type", "radio");
check2.setAttribute("id", "check2");
check3.setAttribute("type", "radio");
check3.setAttribute("id", "check3");

div2.appendChild(check1);
div2.appendChild(labelcheck1);

div2.appendChild(check2);
div2.appendChild(labelcheck2);

div2.appendChild(check3);
div2.appendChild(labelcheck3);

document.body.appendChild(div2);

document.body.appendChild(document.querySelector("footer"));

let ciudades = [];

let ciudad = Array.from(document.getElementById("idCiudades").querySelectorAll("li"));
console.log(ciudad);
function devolverArray(){
    let ciudad = Array.from(document.getElementById("idCiudades").querySelectorAll("li"));
    let habitantes = Array.from(document.getElementById("idHabitantes").querySelectorAll("li"));

    for(let i = 0; i < ciudad.length; i++){
        ciudades = [objeto = {
            nombre: ciudad[i],
            habitantes: habitantes[i],
        }];
    }
    console.log(ciudades);
    
}

devolverArray();

check1.addEventListener("click", );

check2.addEventListener("click", ordenarCiudades);

function ordenarCiudades(){
    let ciudad = Array.from(document.getElementById("idCiudades").querySelectorAll("li"));
    let habitantes = Array.from(document.getElementById("idHabitantes").querySelectorAll("li"));
    
    let li1 = document.createElement("li");
    let li2 = document.createElement("li");
    li1.appendChild(document.createTextNode(ciudad.sort()));
    li2.appendChild(document.createTextNode(habitantes.sort(ciudad.sort())))
    document.getElementById("idCiudades").innerHTML = "";
    document.getElementById("idCiudades").appendChild(li1);
    document.getElementById("idHabitantes").innerHTML = "";
    document.getElementById("idHabitantes").appendChild(li2);
    
}