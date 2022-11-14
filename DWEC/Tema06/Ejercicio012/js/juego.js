// variables de los diferentes divs que he creado.
const circulo = document.getElementById("idCirculo");
const circuloInt = document.getElementById("idCentroCirculo");
const pistola = document.getElementById("idPistola");
const aciertos = document.getElementById("aciertos");
const fallos = document.getElementById("fallos");

// variables de los sonidos.
const sonidoAcierto = document.getElementById("audio_acierto");
const sonidoFallo = document.getElementById("audio_error");
const sonidoCerca = document.getElementById("audio_cerca");

// variables de los botones de resetear el marcador y de la musica.
const botonreset = document.getElementById("idResetMarcadores");
const musica = document.getElementById("idMusica");

// variable de los checkbox.
const aciertos3 = document.getElementById("id3aciertos");
const aciertos6 = document.getElementById("id6aciertos");
aciertos3.style.display = "none";
aciertos6.style.display = "none";

// variables de los input number.
const inputVelocidadDiana = document.getElementById("velocidadDiana");
const inputDiametroDiana = document.getElementById("diametroDiana");
const inputVelocidadFlechaH = document.getElementById("velocidadFlechah");

// colocacion de la diana en el medio del documento.
pistola.style.left = `${document.documentElement.clientWidth/2}px`;

// variables de los valores de las posiciones en el documento de la pistola.
let posicionleft = getComputedStyle(pistola, null).getPropertyValue("left").slice(0, -2);
let posicion = getComputedStyle(pistola, null).getPropertyValue("top").slice(0, -2);
let posicionorg = posicion;

// booleano para los sonidos.
let sonidoActivado = true;

// velocidad de la diana.
let velocidadDiana = 10;
let xdiana = 50;

// velocidad de la flecha.
let velocidadFlecha = 20;
let velocidadFlecha2 = 10;

// contador de los aciertos y errores.
let contAciertos = 0;
let contErrores = 0;

// booleano para comprobar si se ha realizado el disparo.
let disparoEfectuado = false;

// booleano para comprobar en que direccion se mueve la diana.
let mov = true;

// funcion para el movimiento de la diana.
function movDiana(){
    if(mov){
        xdiana += velocidadDiana;
        circulo.style.left = `${xdiana}px`;
    } else {
        xdiana -= velocidadDiana;
        circulo.style.left = `${xdiana}px`;
    }
    // compruebo que la diana se encuentra en el maximo de el documento -100, para evitar que no sobresalga la diana.
    if(xdiana >= document.documentElement.clientWidth-100){
        mov = false;
    // compruebo si es menor o igual a 0
    } else if(xdiana <= 0){
        mov = true;
    }
}
// funcion para comprobar las colisiones de la flecha con la diana.
function compColisiones(){
    // con estas variables cojo un array de todas las medias de la diana y la flecha.
    const circulo_pos = circulo.getBoundingClientRect();
    const pistola_pos = pistola.getBoundingClientRect();
        
        // con las variables anteriores, compruebo las posiciones x e y.
        if((circulo_pos.x + circulo_pos.width) > pistola_pos.x && pistola_pos.y < circulo_pos.bottom && 
        circulo_pos.x < (pistola_pos.x + pistola_pos.width)){
            return true;
        }
    return false;
}

// funcion del contador de aciertos
function contadorAciertos(){
    // creo un elemento p para añadir al div creado de aciertos, donde añado el contador de aciertos
    let p1 = document.createElement("p");
    aciertos.innerHTML = "";
    contAciertos++;
    p1.appendChild(document.createTextNode(`ACIERTOS: ${contAciertos}`));
    p1.style.color = "white";
    p1.style.fontSize = "30px";
    aciertos.appendChild(p1);
    // pregunto si los aciertos son 3 y cambio el fondo del html, añado el checkbox y su label de 3 aciertos y reduzco la velocidad de la flecha a la mitad.
    if(contAciertos == 3){
        document.querySelector("html").style.backgroundColor = "rgb(255, 116, 116)";
        aciertos3.style.display = "inline";
        document.getElementById("laciertos3").style.display = "inline";
        velocidadFlecha = velocidadFlecha/2;
    }
    // compruebo que son 6 aciertos y añado el checkbox y el label de 6 aciertos.
    if(contAciertos == 6){
        aciertos6.style.display = "inline";
        document.getElementById("laciertos6").style.display = "inline";
    }
    // compruebo que es multiplo de 3 y que NO es el numero 3, ya que especifica que sea de 6,9,12...etc.
    if(contAciertos%3 == 0 && contAciertos != 3){
        velocidadFlecha = velocidadFlecha/2;
    }
}
// funcion para el contador de fallos.
function contadorFallos(){
    // hago lo mismo que en el de aciertos, añado un elemento p con el contador de errores y lo inserto en un div de fallos.
    let p2 = document.createElement("p");
    fallos.innerHTML = "";
    contErrores++;
    p2.appendChild(document.createTextNode(`ERRORES: ${contErrores}`));
    p2.style.color = "white";
    p2.style.fontSize = "30px";
    fallos.appendChild(p2);
}

// funcion para resetear el marcador de aciertos y errores.
function resetMarcadores(){
    contAciertos = 0;
    contErrores = 0;
    aciertos.innerHTML = "";
    fallos.innerHTML = "";
}

// funcion para activar y resetear la musica
function modMusica(){
    // compruebo que el booleano de sonidoActivado es true. Si lo es, lo cambia a false y cambio el valor del boton de musica. Si no es true, hace lo contrario.
    if(sonidoActivado){
        sonidoActivado = false;
        musica.value = "Activar musica";
    } else {
        sonidoActivado = true;
        musica.value = "Quitar musica";
    }
}

// con esta funcion modificamos la velocidad de la diana mediante un input de numero
function modVelocidadDiana(){
    // cojo el valor del input y lo meto en el de la velocidad de la diana.
    // lo paso como Float por que al pasarlo normal es un string metiendose en una variable ya en uso como float, rompiendose el movimiento de la diana.
    velocidadDiana = parseFloat(inputVelocidadDiana.value);
}

// funcion del diametro de la diana.
function modDiametroDiana(){
    circulo.style.height = `${parseInt(inputDiametroDiana.value)}px`;
    circuloInt.style.height = `${parseInt(inputDiametroDiana.value)-20}px`;
    circulo.style.width = `${parseInt(inputDiametroDiana.value)}px`;
    circuloInt.style.width = `${parseInt(inputDiametroDiana.value)-20}px`;
}

// funcion de la velocidad de la flecha horizontal
function modVelocidadFlechaH(){
    // hago lo mismo que con el de la diana, tambien pasandolo a float.
    velocidadFlecha2 = parseFloat(inputVelocidadFlechaH.value);
}

// funcion de los eventos de las teclas
function teclas(e){
    switch (e.key) {
        case 'ArrowLeft':
            // compruebo que cuando disparo no lo puedo mover a los lados.
            if(!disparoEfectuado){
                posicionleft -= velocidadFlecha2;
                pistola.style.left = `${posicionleft}px`;
            }
            break;
    
        case 'ArrowRight':
            // compruebo que cuando disparo no lo puedo mover a los lados.
            if(!disparoEfectuado){
                posicionleft += velocidadFlecha2;
                pistola.style.left = `${posicionleft}px`;
            }
            break;
         
        case 'ArrowUp':
            // compruebo que cuando disparo no pueda disparar otra vez.
            if(!disparoEfectuado){
                disparoEfectuado = true;
                // compruebo si el sonido esta activado y pongo una musica.
                if(sonidoActivado){
                    sonidoCerca.play();
                }
                // intervalo de la flecha y su funcion.
                intervalo2 = setInterval(function movPistola2() {
                    posicion -= velocidadFlecha;
                    pistola.style.top = `${posicion}px`;
                    // compruebo si la variable posicion es menor que 60, ya que ese es el limite del top que le he puesto si falla.
                    if(posicion <= 60){
                        // devuelvo a la flecha a su posicion original.
                        pistola.style.top = `${posicionorg}px`;
                        posicion = posicionorg;
                        // acabo con el intervalo.
                        clearInterval(intervalo2);
                        disparoEfectuado = false;
                        // llamo a la funcion de fallos y añado 1.
                        contadorFallos();
                        if(sonidoActivado){
                            sonidoFallo.play();
                        }
                    }
                    // compruebo si ha colisionado
                    if(compColisiones() == true){
                        // si lo hace, acabo con el intervalo y lo devuelvo a la posicion original.
                        clearInterval(intervalo2);
                        disparoEfectuado = false;
                        pistola.style.top = `${posicionorg}px`;
                        posicion = posicionorg;
                        // llamo a la funcion de aciertos y añado 1.
                        contadorAciertos();
                        if(sonidoActivado){
                            sonidoAcierto.play();
                        }
                        // esto es una funcion que he añadido a mayores, te la tengo por si quieres verla.
                        // cuando acierto lanza unos confettis creados con canvas que llamo desde otro archivo js, como tengo adjuntado.
                        // no lo he creado yo, solo lo he añadido por que me parecio curioso.
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

// hago un eventListener para que escuche a mis teclas.
document.addEventListener("keydown", teclas);

// intervalo del movimiento de la diana.
let intervalo = setInterval(movDiana, 50);

// botones que activan su evento al hacer click.
botonreset.addEventListener("click", resetMarcadores);
musica.addEventListener("click", modMusica);

// inputs que hacen su evento al cambiar su valor.
inputVelocidadDiana.addEventListener("input", modVelocidadDiana);
inputDiametroDiana.addEventListener("input", modDiametroDiana);
inputVelocidadFlechaH.addEventListener("input", modVelocidadFlechaH);