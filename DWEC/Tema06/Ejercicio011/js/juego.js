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

let contAciertos = 1;
let contErrores = 1;

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

function contador(){
    aciertos.innerHTML = "";
    const p1 = document.createElement("p");
    const p2 = document.createElement("p");
    if(compColisiones()){
        contAciertos++;
        p1.appendChild(document.createTextNode(`ACIERTOS: ${contAciertos}`));
        p2.appendChild(document.createTextNode(`ERRORES: ${contErrores}`));
        aciertos.appendChild(p1);
        aciertos.appendChild(p2);
    } else {
        contErrores++;
        p1.appendChild(document.createTextNode(`ACIERTOS: ${contAciertos}`));
        p2.appendChild(document.createTextNode(`ERRORES: ${contErrores}`));
        aciertos.appendChild(p1);
        aciertos.appendChild(p2);
    }
}

document.addEventListener("keydown", function(e){
    if(e.key == "ArrowUp"){
        let intervalo2 = setInterval(function movPistola2() {
            posicion -= velocidad;
            pistola.style.top = `${posicion}px`;
            if(posicion <= 60){
                pistola.style.top = `${posicionorg}px`;
                posicion = posicionorg;
                contador();
            }
            if(compColisiones() == true){
                clearInterval(intervalo2);
                pistola.style.top = `${posicionorg}px`;
                posicion = posicionorg;
                sonidoAcierto.play();
                contador();
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
    } else if(e.key == "ArrowLeft"){
        posicionleft -= velocidad;
        pistola.style.left = `${posicionleft}px`;
    } else if(e.key == "ArrowRight"){
        posicionleft += velocidad;
        pistola.style.left = `${posicionleft}px`;
    }
});

let intervalo = setInterval(movDiana, 50);