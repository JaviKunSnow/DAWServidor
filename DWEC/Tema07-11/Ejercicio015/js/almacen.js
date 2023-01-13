import { Producto } from "./producto.js";

let productos = [];

console.log(localStorage);

let div = document.getElementById("caja");
let inptNombre = document.getElementById("nombre");
let inptPrecio = document.getElementById("precio");

document.getElementById("guardar").addEventListener("click", function() {
    if(localStorage.length != 0 && productos.length == 0) {
        let productosAlmacenados = localStorage.getItem("productosAlmacenados");
        let productosParseados = JSON.parse(productosAlmacenados);
        productosParseados.forEach(element => {
            let nuevoProducto = new Producto();
            nuevoProducto.id = element.id;
            nuevoProducto.nombre = element._nombre;
            nuevoProducto.precio = element._precio;
            productos.push(nuevoProducto);
        });
    }

    let nuevoProducto = new Producto();
    nuevoProducto.nombre = inptNombre.value;
    nuevoProducto.precio = inptPrecio.value;
    productos.push(nuevoProducto);
    console.log(productos);
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
    productos = [];
    Producto.contadorId = 0;
    div.innerHTML = "Datos eliminados.";
});

