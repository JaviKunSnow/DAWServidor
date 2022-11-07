const circulo = document.getElementById("circulo");

let velocidad=10;
let xdiana=50;

function interv(){
    xdiana += velocidad;
    document.getElementById("circulo").style.left = `${xdiana}px`;
}
    


let intervalo = setInterval(interv, 50);