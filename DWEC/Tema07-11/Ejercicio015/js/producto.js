
class Producto {

    static contadorId = 0;

    constructor(nombre, precio){
        this.id = ++Producto.contadorId;
        this._nombre = nombre;
        this._precio = precio;
    }

    get nombre() {
        return this._nombre.toUpperCase();
    }

    set nombre(nombre) {
        this._nombre = nombre.toUpperCase();
    }
    // Nose por que no me funciona la conversion a moneda
    get precio() {
        return this._precio;
    }

    set precio(precio) {
        this._precio = precio;
    }
    // tambien lo he probado aqui y no me funciona
    toString() {
        return `${this.id}: ${this.nombre} :${this.precio.toLocaleString('es-ES', {style: 'currency', currency: 'EUR'})}`;
    }
};

let productos = [];

console.log(localStorage);

let div = document.getElementById("caja");
let inptNombre = document.getElementById("nombre");
let inptPrecio = document.getElementById("precio");

document.getElementById("guardar").addEventListener("click", function() {
    productos.push(new Producto(inptNombre.value, inptPrecio.value));
    localStorage.productosAlmacenados = JSON.stringify(productos);
    div.innerHTML = "";
    productos.forEach(element => {
        let p = document.createElement("p");
        p.appendChild(document.createTextNode(element.toString()));
        div.appendChild(p);
    });

});

document.getElementById("reset").addEventListener("click", function() {
    inptNombre.value = "";
    inptPrecio.value = "";
});

document.getElementById("limpiar").addEventListener("click", function() {
    div.innerHTML = "Vista limpiada, los datos permanecen.";
});

document.getElementById("eliminar").addEventListener("click", function() {
    localStorage.removeItem("productosAlmacenados");
    div.innerHTML = "Datos eliminados.";
});

