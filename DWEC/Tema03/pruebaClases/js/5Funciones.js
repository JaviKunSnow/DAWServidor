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
    importe(){
        return this.unidades*this.precio;
    }
    toString() {
        return `${this.nombre} ${this.categoria}: ${this.unidades.moneda()} x ${this.precio.moneda()} = ${this.importe().moneda()}`;
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

function prodsSortByName(arrayProductos){
    let nuevoArray = Array.from(arrayProductos);
    return nuevoArray.sort((a, b) => (a.nombre).localeCompare(b.nombre));
}

let porNombre = prodsSortByName(arrayProductos);

console.log(porNombre);

// por precio

function prodsSortByPrice(arrayProductos){
    let nuevoArray = Array.from(arrayProductos);
    return nuevoArray.sort((pro1, pro2) => pro1.precio - pro2.precio);
}

let porPrecio = prodsSortByPrice(arrayProductos);

console.log(porPrecio);

// por precio total

function prodTotalPrice(arrayProductos) {
    let arrayTotal = arrayProductos.reduce((total, producto) => 
    total += producto.importe(), 0);

    return arrayTotal.moneda();
}

let porPrecioTotal=prodTotalPrice(arrayProductos);

console.log(porPrecioTotal);

// array productos con pocas unidades

function prodsWithLowUnits(arrayProductos, num){
    let arrayProd=[];
    arrayProductos.forEach(prod => {
        if(num >= prod.unidades){
            arrayProd.push(prod);
        }
    });
    return arrayProd;
}

let porPocasUnidades = prodsWithLowUnits(arrayProductos, 2);

console.log(porPocasUnidades);

// lista de productos

function prodsList(arrayProductos) {
    const cadena = "lista de Productos:\n" + arrayProductos.reduce((texto, producto) =>
    texto += `\n${producto.toString()}`);
    return cadena;
}

let listaPro = prodsList(arrayProductos);

console.log(listaPro);