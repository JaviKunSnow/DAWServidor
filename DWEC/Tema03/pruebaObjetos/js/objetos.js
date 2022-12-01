/*
let alumno = new Object();

alumno.nombre = "Paco";
alumno["apellidos"] = "Gonzalez Ronaldo";
alumno.edad = 19;

let alumna = {
    nombre: "Pepa",
    apellidos: "Cifuentes Ronaldinho",
    edad: 30,
    medida: {
        altura: 1.7,
        pie: 40,
    },
    getinfo2: ()=> {
        console.log(this);
        return this;
    },
    getinfo3: function(){
        return `${this.nombre} mide ${this.medida.altura} de altura`;
    }
};

console.log(alumna.edad);
console.log(typeof(alumna.edad));
console.log(typeof(alumna.nombre));
console.log(alumna["edad"]);
console.log(alumna);

console.log(alumna.nota?.primera);
console.log(alumna.medida?.pie);

console.log(typeof(alumna.medida));

for(let element in alumna){
    if(typeof element === "object"){
        for(let datos in alumna[element]){
            console.log(datos + ": " + element[datos]);
        }
    } else {
        console.log(element + ": " + alumna[element]); 
    }
}

alumna.getinfo = function(){
    return `${this.nombre} tiene ${this.edad} años`;
};

console.log(alumna.getinfo());
console.log(alumna.getinfo3()); */

Number.prototype.moneda = function() {
    return this.toLocaleString('de-DE', {style: 'currency', currency: 'EUR'});
};

String.prototype.mayus = function() {
    return this.toLocaleUpperCase();
}

let tvSamsung = {
    nombre: 'TV Samsung 42"',
    categoria: "Televisores",
    unidades: 4,
    precio: 345.95,
    importe: function() {
        return (this.unidades*this.precio).moneda();
    },
};

console.log(`${tvSamsung.nombre.mayus()}: ${tvSamsung.importe()}`);
