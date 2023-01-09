let testvalue = "Hola mundo!";
document.cookie = "nombreCookie=" + encodeURIComponent( testvalue );

let prueba1 = "pepeporros";
document.cookie = "paco=" + encodeURIComponent(prueba1);

let prueba2 = "pepe";
document.cookie = "pacoporro=" +  prueba2;

let cookievalue = "pepe charcutero";
document.cookie = "testcookie=" + encodeURIComponent( cookievalue );

let nombre = prompt("Dime el nombre de la Cookie");

cookies(nombre);

function cookies(cookie) {
    let cookieValor = document.cookie;
    let cadenaSeparada1 = cookieValor.split(";");
    cadenaSeparada1 = cadenaSeparada1.toLocaleString();
    let cadenaSeparada2 = cadenaSeparada1.split("=");
    cadenaSeparada2 = cadenaSeparada2.toLocaleString();
    let cadenaSeparada3 = cadenaSeparada2.split(",");
    console.log(cadenaSeparada3);
    for(let i = 0; i < cadenaSeparada3.length; i++) {
        if(cadenaSeparada3[i] == cookie) {
            alert(cadenaSeparada3[i + 1]);
        }
    }
}

