const circulo = document.getElementById("idCirculo");

let velocidad=10;
let xdiana=50;

let mov = true;

function movDiana(){
    if(mov){
        xdiana += velocidad;
        circulo.style.left = `${xdiana}px`;
    } else {
        xdiana -= velocidad;
        circulo.style.left = `${xdiana}px`;
    }

    if(xdiana == window.screen.width-50){
        mov = false;
    } else if(xdiana == 0){
        mov = true;
    }
}
    
let intervalo = setInterval(movDiana, 50);