let a = [2, 2.5, "hola"];
let n = 46;

//console.log(a);
//console.log(a.length);

let s = [2, 2.5, "hola", ["pepe", 2, ["pablo", 5]]]
s[3][2].push("waass");
//console.log(s);

let dias = ["lunes", "martes", 2, 4, 5];
dias.splice(2,0,"miercoles");
//console.log(dias);
dias.splice(2,1);
//console.log(dias);



// EJERCICIO
let compra = ["peras", "manzanas", "kiwis", "platanos", "mandarinas"];
compra.splice(1,1);
console.log(compra);

compra.splice(3,0,"naranjas","sandia")
console.log(compra);

compra.splice(1,1,"cerezas", "nisperos");
console.log(compra);

function añadirAbril(){
    document.write("<ul><li> Abril </li></ul>");
}

añadirAbril();

let notas = [4,8,3,10,5];

