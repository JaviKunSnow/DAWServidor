const MAX = 999;
const MIN = 1;

let aleatorio = Math.floor((Math.random() * (MAX - MIN)) + MIN);
// variable para usarla en el while
let final = false;
// variable contador
let contador = 0;

// Para ver el numero en la consola
console.log("numero oculto: " + aleatorio);

let numero = prompt("Adivina el numero del 1 al 999");

while (final == false) {
    
    // aqui se añade un intento al contador por cada vez que pasa
    contador++;

    // Si se cancela el programa, cambiara la variable booleana de final a true
    if (numero == null) {
        alert("Has decidido terminar el programa, adios");
        final = true;
    } else {
        // Si no se cancela, comprueba si es igual
        if(numero == aleatorio){
            alert("numero aceptado: " + numero + "  intentos: " + contador);
            final = true;
        } else {
            // si no es el mismo numero, comprobara si es mayor o menor y volvera a preguntar
            if(numero > aleatorio){
                numero = prompt("(" + contador + ") es mayor que el numero pedido");
            } else {
                numero = prompt("(" + contador + ") es menor que el numero pedido");
            }
        }
    }
}


