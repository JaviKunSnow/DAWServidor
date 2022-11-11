const circulo = document.getElementById("idCirculo");
const pistola = document.getElementById("idPistola");
const aciertos = document.getElementById("aciertos");
const sonidoAcierto = document.getElementById("audio_acierto");

pistola.style.left = `${document.documentElement.clientWidth/2}px`;

let posicionleft = getComputedStyle(pistola, null).getPropertyValue("left").slice(0, -2);
let posicion = getComputedStyle(pistola, null).getPropertyValue("top").slice(0, -2);
let posicionorg = posicion;

let velocidad=10;
let xdiana=50;

let intervaloFlecha;

let p1 = document.createElement("p");
let p2 = document.createElement("p");

let contAciertos = 0;
let contErrores = 0;

let disparoEfectuado = false;


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
        
        if((circulo_pos.x + circulo_pos.width) > pistola_pos.x && pistola_pos.y < circulo_pos.bottom && 
        circulo_pos.x < (pistola_pos.x + pistola_pos.width)){
            return true;
        }
    return false;
}

function contadorAciertos(){
    let p1 = document.createElement("p");
    let p2 = document.createElement("p");
    aciertos.innerHTML = "";
    contAciertos++;
    p1.appendChild(document.createTextNode(`ACIERTOS: ${contAciertos}`));
    p2.appendChild(document.createTextNode(`ERRORES: ${contErrores}`));
    aciertos.appendChild(p1);
    aciertos.appendChild(p2);
}

function contadorFallos(){
    let p1 = document.createElement("p");
    let p2 = document.createElement("p");
    aciertos.innerHTML = "";
    contErrores++;
    p1.appendChild(document.createTextNode(`ACIERTOS: ${contAciertos}`));
    p2.appendChild(document.createTextNode(`ERRORES: ${contErrores}`));
    aciertos.appendChild(p1);
    aciertos.appendChild(p2);
}

function teclas(e){
    switch (e.key) {
        case 'ArrowLeft':
            posicionleft -= velocidad;
            pistola.style.left = `${posicionleft}px`;
            break;
    
        case 'ArrowRight':
            posicionleft += velocidad;
            pistola.style.left = `${posicionleft}px`;
            break;
         
        case 'ArrowUp':
            if(!disparoEfectuado){
                intervalo2 = setInterval(function movPistola2() {
                    posicion -= velocidad;
                    pistola.style.top = `${posicion}px`;
                    if(posicion <= 60){
                        pistola.style.top = `${posicionorg}px`;
                        posicion = posicionorg;
                        contadorFallos();
                    }
                    if(compColisiones() == true){
                        clearInterval(intervalo2);
                        pistola.style.top = `${posicionorg}px`;
                        posicion = posicionorg;
                        sonidoAcierto.play();
                        contadorAciertos();
                        const start = () => {
                            setTimeout(function(){
                                confetti.start();
                            }, 1000);
                        }
                        const stop = () => {
                            setTimeout(function(){
                                confetti.stop();
                            }, 5000);
                        }
                        start();
                        stop();
                    }
                }, 50);
            }
            break;
    }
}

document.addEventListener("keydown", teclas);
let intervalo = setInterval(movDiana, 50);