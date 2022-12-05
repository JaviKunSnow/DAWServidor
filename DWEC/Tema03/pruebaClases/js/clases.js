Number.prototype.moneda = function() {
    return this.toLocaleString('es-ES', {style: 'currency', currency: 'EUR'});
};

class Producto {
    constructor(nombre, categoria, unidades, precio){
        this.nombre = nombre;
        this.categoria = categoria;
        this.unidades = unidades;
        this.precio = precio;
    }
    toString() {
        return `${this.nombre} ${this.categoria}: ${this.unidades.moneda()} x ${this.precio.moneda()} = ${(this.unidades*this.precio).moneda()}`;
    }
};

let prod1 = new Producto('TV Samsung 42"', "Televisor", 4, 345.95);
//console.log(prod1.getInfo());

let prod2 = new Producto('Nvidia RTX 2060 TI', "Tarjeta Grafica", 3, 1000.99);
//console.log(prod2.getInfo());

let prod3 = new Producto('TV Xiaomi 32"', "Televisor", 2, 200.50);
//console.log(prod3.getInfo());

let prod6 = new Producto('Cascos Sony"', "Audio", 1, 15.50);

let prod7 = new Producto('Canon Camera', "Camara", 6, 100.50);

let arrayProductos = [prod1, prod2, prod3, prod6, prod7];

// por nombre

function prodsSortByName(arrayPro){
    return arrayPro.sort((a, b) => (a.nombre).localeCompare(b.nombre));
}

let porNombre = prodsSortByName(arrayProductos);

console.log(porNombre);

// por precio

function prodsSortByPrice(arrayPro){
    return arrayPro.sort((pro1, pro2) => pro1.precio - pro2.precio);
}

let porPrecio = prodsSortByPrice(arrayProductos);
console.log(porPrecio);

// por precio total

let porPrecioTotal = arrayProductos.sort((pro1, pro2) => (pro1.precio*pro1.unidades) - (pro2.precio*pro2.unidades))
console.log(porPrecioTotal);




/*class Alumno {
    constructor(nombre, apellidos, edad){
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.edad = edad;
    }
    getInfo(){
        function nomAlum(){
            return this.nombre + " " + this.apellidos;
        }
        return "El alumno " + nomAlum() + " tiene " + this.edad + " años";
    }
}

let alumno1 = new Alumno("Paco", "Popoe", 20);
console.log(alumno1.getInfo());
*/
class MasProductos extends Producto {
    constructor(nombre, categoria, unidades, precio, descuento){
        super(nombre, categoria, unidades, precio);
        this.descuento = descuento;
    }
    getDescuento(){
        if(this.descuento === "si") return true;
        else return false;
    }
    getInfo(){
        return `${this.nombre} (${this.categoria}): ${this.unidades} uds x ${this.precio.moneda()} = ${(this.getDescuento() ? ((this.unidades*this.precio)/5).moneda() : (this.unidades*this.precio).moneda())}`;
    }
};
let prod4 = new MasProductos('TV Samsung 42"', "Televisor", 4, 345.95, "si");
console.log(prod4.getInfo());

class Televisores extends Producto {
    constructor(nombre, categoria, unidades, precio, tamano){
        super(nombre, categoria, unidades, precio);
        this.tamano = tamano;
    }
    getTamano(){
        if(typeof this.tamano === "undefined"){
            return true;
        } 
        return false;
    }
    getInfo(){
        return `${this.nombre} tamaño: ${this.getTamano() ? "No esta especificado" : this.tamano} (${this.categoria}): ${this.unidades} uds x ${this.precio.moneda()} = ${((this.unidades*this.precio).moneda())}`;
    }
};

let prod5 = new Televisores('TV Samsung 42"', "Televisor", 4, 345.95);
console.log(prod5.getInfo());

