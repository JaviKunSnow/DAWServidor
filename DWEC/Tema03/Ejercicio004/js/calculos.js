// Funcion 1: area del circulo.

console.log("Pruebas Funcion 1:");

function areaCirculo(radio){
    if(radio <= 0){
        throw "El numero es 0 o menor";
    } else if(typeof radio == 'string'){
        throw "El valor no es un numero";
    }
    return Math.PI * (radio + radio);
}

try {
    console.log("El area es: " + areaCirculo("5"));
    
} catch (error) {
    console.log(error);
}

try {
    console.log("El area es: " + areaCirculo(5));
} catch (error) {
    console.log(error);
}

// Funcion 2: perimetro del circulo.

console.log("Pruebas Funcion 2:");

function perCirculo(radio){
    if(radio <= 0){
        throw "El numero es 0 o menor";
    } else if(typeof radio == 'string'){
        throw "El valor no es un numero";
    }
    return 2 * Math.PI * radio;
}

try {
    console.log("El perimetro es: " + perCirculo("hosa"));
} catch (error) {
    console.log(error);
}

try {
    console.log("El perimetro es: " + perCirculo(5));
} catch (error) {
    console.log(error);
}

// Funcion 3: perimetro regular.

console.log("Pruebas Funcion 3:");

function perPoligono(longitud, lados){
    if(lados < 3){
        throw "No se han pasado 3 lados";
    } else if(longitud <= 0){
        throw "La longitud es 0 o menor.";
    } else if(typeof lados == 'string' || typeof longitud == 'string'){
        throw "Lados o Longitud no es un numero";
    }
    return lados * longitud;
}

try {
    console.log("El perimetro es: " + perPoligono(10,3));
} catch (error) {
    console.log(error);
}

try {
    console.log("El perimetro es: " + perPoligono(10,5));
} catch (error) {
    console.log(error);
}

try {
    console.log("El perimetro es: " + perPoligono(10,1));
} catch (error) {
    console.log(error);
}

try {
    console.log("El perimetro es: " + perPoligono(0,3));
} catch (error) {
    console.log(error);
}

try {
    console.log("El perimetro es: " + perPoligono("10",3));
} catch (error) {
    console.log(error);
}

try {
    console.log("El perimetro es: " + perPoligono(10,"3"));
} catch (error) {
    console.log(error);
}

// Funcion 4: area de poligono

console.log("Pruebas Funcion 4:");

function areaPoligono(longitud, lados){
    let perimetro=0;
    try {
        perimetro = perPoligono(longitud,lados);
    } catch (error) {
        throw error;
    }

    let angulo = 360/lados;
    let apotema = (longitud/2)/Math.tan(angulo/2);
    return (perimetro*apotema)/2;
}

try {
    console.log("El area del poligono es: " + areaPoligono(5,4));
} catch (error) {
    console.error(error);
}

try {
    console.log("El area del poligono es: " + areaPoligono("4",4));
} catch (error) {
    console.error(error);
}

try {
    console.log("El area del poligono es: " + areaPoligono(4,"lados"));
} catch (error) {
    console.error(error);
}



