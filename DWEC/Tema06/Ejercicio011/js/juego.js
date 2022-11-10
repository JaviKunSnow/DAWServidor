const circulo = document.getElementById("idCirculo");
const pistola = document.getElementById("idPistola");

pistola.style.left = `${document.documentElement.clientWidth/2}px`;

let posicionleft = getComputedStyle(pistola, null).getPropertyValue("left").slice(0, -2);
let posicion= getComputedStyle(pistola, null).getPropertyValue("top").slice(0, -2);
let posicionorg = posicion;

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

    if(xdiana >= document.documentElement.clientWidth-100){
        mov = false;
    } else if(xdiana == 0){
        mov = true;
    }
}


function compColisiones(){
    const circulo_pos = circulo.getBoundingClientRect();
    const pistola_pos = pistola.getBoundingClientRect();
        
        if(circulo_pos.right < pistola_pos.left && pistola_pos.top < circulo_pos.bottom || circulo_pos.left < pistola_pos.right
            && pistola_pos.top < circulo_pos.bottom){
            return true;
        }
    return false;
}
console.log(circulo.left);


document.addEventListener("keydown", function(e){
    if(e.key == "ArrowUp"){
        let intervalo2 = setInterval(function movPistola2() {
            posicion -= 20;
            pistola.style.top = `${posicion}px`;
            if(posicion <= 80){
                pistola.style.top = `${posicionorg}px`;
                posicion = posicionorg;
            }
            if(compColisiones() == true){
                console.log("cxasdsdfs");
                clearInterval(intervalo2);
                clearInterval(intervalo);
            }

        }, 50);
    } else if(e.key == "ArrowLeft"){
        posicionleft -= velocidad;
        pistola.style.left = `${posicionleft}px`;
    } else if(e.key == "ArrowRight"){
        posicionleft += velocidad;
        pistola.style.left = `${posicionleft}px`;
    }
});

    
let intervalo = setInterval(movDiana, 50);