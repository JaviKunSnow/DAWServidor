const circulo = document.getElementById("idCirculo");
const pistola = document.getElementById("idPistola");
const aciertos = document.getElementById("aciertos");
const fallos = document.getElementById("fallos");

const sonidoAcierto = document.getElementById("audio_acierto");
const sonidoFallo = document.getElementById("audio_error");
const sonidoCerca = document.getElementById("audio_cerca");

const botonreset = document.getElementById("idResetMarcadores");
const musica = document.getElementById("idMusica");

const aciertos3 = document.getElementById("id3aciertos");
const aciertos6 = document.getElementById("id6aciertos");
aciertos3.style.display = "none";
aciertos6.style.display = "none";

const inputVelocidadDiana = document.getElementById("velocidadDiana");
const inputDiametroDiana = document.getElementById("diametroDiana");
const inputVelocidadFlechaH = document.getElementById("velocidadFlechah");

pistola.style.left = `${document.documentElement.clientWidth/2}px`;

let posicionleft = getComputedStyle(pistola, null).getPropertyValue("left").slice(0, -2);
let posicion = getComputedStyle(pistola, null).getPropertyValue("top").slice(0, -2);
let posicionorg = posicion;

let sonidoActivado = true;

let velocidadDiana = 10;
let xdiana = 50;

let velocidadFlecha = 20;
let velocidadFlechaH = 10;
let velocidadFlecha2 = 10;

let intervaloFlecha;

let p1 = document.createElement("p");
let p2 = document.createElement("p");

let contAciertos = 0;
let contErrores = 0;

let disparoEfectuado = false;


let mov = true;

function movDiana(){
    if(mov){
        xdiana += velocidadDiana;
        circulo.style.left = `${xdiana}px`;
    } else {
        xdiana -= velocidadDiana;
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
    aciertos.innerHTML = "";
    contAciertos++;
    p1.appendChild(document.createTextNode(`ACIERTOS: ${contAciertos}`));
    p1.style.color = "white";
    p1.style.fontSize = "30px";
    aciertos.appendChild(p1);
    if(contAciertos == 3){
        document.querySelector("html").style.backgroundColor = "rgb(255, 116, 116)";
        aciertos3.style.display = "block";
        document.getElementById("text3aciertos").style.display = "block";
        aciertos3.value = "3 aciertos";
        velocidadFlecha = velocidadFlecha/2;
    }

    if(contAciertos == 6){
        aciertos6.style.display = "block";
        document.getElementById("text6aciertos").style.display = "block";
    }
    if(contAciertos%3 == 0 && contAciertos != 3){
        velocidadFlecha
    }
}

function contadorFallos(){
    let p2 = document.createElement("p");
    fallos.innerHTML = "";
    contErrores++;
    p2.appendChild(document.createTextNode(`ERRORES: ${contErrores}`));
    p2.style.color = "white";
    p2.style.fontSize = "30px";
    fallos.appendChild(p2);
}

function resetMarcadores(){
    contAciertos = 0;
    contErrores = 0;
    aciertos.innerHTML = "";
    fallos.innerHTML = "";
}

function modMusica(){
    if(sonidoActivado){
        sonidoActivado = false;
        musica.value = "Activar musica";
    } else {
        sonidoActivado = true;
        musica.value = "Quitar musica";
    }
}

function modVelocidadDiana(){
    velocidadDiana = inputVelocidadDiana.value;
}

function modVelocidadFlechaH(){
    velocidadFlechaH = inputVelocidadFlechaH.value;
}


function teclas(e){
    switch (e.key) {
        case 'ArrowLeft':
            posicionleft -= velocidadFlecha2;
            pistola.style.left = `${posicionleft}px`;
            break;
    
        case 'ArrowRight':
            posicionleft += velocidadFlechaH;
            pistola.style.left = `${posicionleft}px`;
            break;
         
        case 'ArrowUp':
            if(!disparoEfectuado){
                disparoEfectuado = true;
                if(sonidoActivado){
                    sonidoCerca.play();
                }
                intervalo2 = setInterval(function movPistola2() {
                    posicion -= velocidadFlecha;
                    pistola.style.top = `${posicion}px`;
                    if(posicion <= 60){
                        pistola.style.top = `${posicionorg}px`;
                        posicion = posicionorg;
                        clearInterval(intervalo2);
                        disparoEfectuado = false;
                        contadorFallos();
                        if(sonidoActivado){
                            sonidoFallo.play();
                        }
                    }
                    if(compColisiones() == true){
                        clearInterval(intervalo2);
                        disparoEfectuado = false;
                        pistola.style.top = `${posicionorg}px`;
                        posicion = posicionorg;
                        contadorAciertos();
                        if(sonidoActivado){
                            sonidoAcierto.play();
                        }
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

botonreset.addEventListener("click", resetMarcadores);
musica.addEventListener("click", modMusica);
inputVelocidadDiana.addEventListener("change", modVelocidadDiana);
inputVelocidadFlechaH.addEventListener("change", modVelocidadFlechaH);