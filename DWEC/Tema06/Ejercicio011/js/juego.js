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
    const circulo_pos = {t: getComputedStyle(circulo, null).getPropertyValue("top"), l: circulo.style.left,
                        r: circulo.style.left + circulo.style.width, b: getComputedStyle(circulo, null).getPropertyValue("bottom") };
    const pistola_pos = {t: pistola.style.top, l: pistola.style.left,
                        r: pistola.style.left + pistola.style.width, b: pistola.style.top + pistola.style.height};
        
    if(circulo_pos.l >= pistola_pos.r && circulo_pos.r <= pistola_pos.l 
        && circulo_pos.b <= pistola_pos.t && circulo_pos.t >= pistola_pos.b){
            return true;
        }
    return false;
}

document.addEventListener("keydown", function(e){
    if(e.key == "ArrowUp"){
        let intervalo2 = setInterval(function movPistola2() {
            console.log("entra");
            posicion -= velocidad;
            pistola.style.top = `${posicion}px`;
            if(posicion <= 80){
                pistola.style.top = `${posicionorg}px`;
                posicion = posicionorg;
            }
            if(compColisiones() == true){
                console.log("colisionado");
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