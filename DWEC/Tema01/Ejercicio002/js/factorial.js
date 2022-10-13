let numero = "";

numero = prompt("Introduce un numero entero positivo");

if(numero == null){
    alert("Has cancelado el programa.")
} else if(numero <= 0){
    while(numero <= 0){
        numero = prompt("El numero introducido es menor o igual que 0, introduce otro:");
    }
}

let n = numero;

for(let i = numero - 1; i >= 1; i--){
    console.log("variable i: " + i)
    console.log("variable numero: " + numero)
    numero = numero * i;
}

alert(n + "! =" + numero);