const diametrosArray=[
    80,34,50,120,8,62,17
];

const coloresArray=[
    'linear-gradient(to bottom, #2196f3, #009688)',
    'linear-gradient(to left, #D196f3, #539688)',
    'linear-gradient(to top, #5196f3, #709688)',
    'linear-gradient(to right, #4196f3, #909688)',
    'linear-gradient(to right, #2196f3, #D09688)'
];

let contador = 0;

let div = document.createElement("div");
let boton = document.createElement("input");
boton.setAttribute("type", "button");
boton.setAttribute("value", "boola");

div.appendChild(boton);
div.setAttribute("style", "justify-content: center; display:flex ")

document.body.appendChild(div);

function crearCirculo(){
    let divCirculo = document.createElement("div");
    let color = Math.floor(Math.random() * coloresArray.length);
    console.log(color);
    divCirculo.setAttribute("style", `border-radius: 50%; float: left; margin: 20px`);
    divCirculo.style.background = `url(#), ${coloresArray[color]}`;
    diametro1 = Math.floor(Math.random() * diametrosArray.length);
    divCirculo.style.height = diametrosArray[diametro1] + "px";
    divCirculo.style.width = diametrosArray[diametro1] + "px";
    console.log(diametro1);
    document.body.appendChild(divCirculo);

    
}



boton.addEventListener("click", crearCirculo);

