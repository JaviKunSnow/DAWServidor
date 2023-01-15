import { Producto } from "./producto.js";

let productos = [];

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
document.getElementById("reset").onclick = reset;
let decimales = document.getElementById("decimales");
let div = document.getElementById("caja");

let inptId = document.getElementById("id");
let inptNombre = document.getElementById("nombre");
let inptPrecio = document.getElementById("precio");

let div2 = document.getElementById("caja2");
let filtro1 = document.getElementById("filtro1");
let filtro2 = document.getElementById("filtro2");


document.getElementById("crear").addEventListener("click", function() {
    if(inptNombre.disabled == true && inptPrecio.disabled == true) {
        inptNombre.disabled = false;
        inptPrecio.disabled = false;
        document.getElementById("eliminar").disabled = true;
        document.getElementById("modificar").disabled = true;
    } else {
        let nuevoProducto = new Producto();
        nuevoProducto.nombre = inptNombre.value;
        nuevoProducto.precio = inptPrecio.value;
        productos.push(nuevoProducto);
        console.log(productos);
        localStorage.productosAlmacenados = JSON.stringify(productos);
        reset();
    }

});

document.getElementById("consultar").addEventListener("click", function() {
    
    div.innerHTML = "";

    productos.forEach(element => {
        element.precio = parseFloat(element.precio).toFixed(decimales);
        let p = document.createElement("p");
        p.appendChild(document.createTextNode(element.toString()));
        div.appendChild(p);
    });
});

document.getElementById("modificar").addEventListener("click", function() {
    
    if(inptId.value.length == 0) {
        inptId.disabled = false;
        inptNombre.disabled = false;
        inptPrecio.disabled = false;
        document.getElementById("eliminar").disabled = true;
        document.getElementById("crear").disabled = true;
    } else {
        productos.forEach(element => {
            if(element.id == inptId.value) {
                element.nombre = inptNombre.value;
                element.precio = parseFloat(inptPrecio.value).toFixed(decimales);
                div.innerHTML = "Producto modificado!";
            }
        })
        localStorage.productosAlmacenados = JSON.stringify(productos);
        reset();
    }

});

document.getElementById("eliminar").addEventListener("click", function() {
    
    if(inptId.value.length == 0) {
        inptId.disabled = false;
        inptNombre.disabled = true;
        inptPrecio.disabled = true;
        document.getElementById("crear").disabled = true;
        document.getElementById("modificar").disabled = true;
    } else {
        let id = productos.findIndex(element => element.id == inptId.value);
        productos.splice(id, 1);

        localStorage.productosAlmacenados = JSON.stringify(productos);
        div.innerHTML = "Producto modificado!";
        reset();
    }

});

document.getElementById("ordenar").addEventListener("click", function() {
    if(filtro1.disabled == true && filtro2.disabled == true) {
        filtro1.disabled = false;
        filtro2.disabled = false;
        
    } else {
        let productosOrdenados;

        productosOrdenados = productos.filter(function(elemento) {
            return elemento.precio >= filtro1.value && elemento.precio <= filtro2.value;
        });

        div2.innerHTML = "";

        productosOrdenados.forEach(element => {

            let p = document.createElement("p");
            p.appendChild(document.createTextNode(element.toString()));
            div2.appendChild(p);
        });
        reset();
    }
})

document.getElementById("texto").addEventListener("change", function() {
    let fuente = this.value;
    document.body.style.fontFamily = fuente;
})

document.getElementById("color").addEventListener("change", function() {
    let color = this.value;
    document.body.style.backgroundColor = color;
    if(color == "black") {
        document.body.style.color = "white";
    }
})

function reset() {
    inptId.value = "";
    inptNombre.value = "";
    inptPrecio.value = "";
    inptId.disabled = true;
    inptNombre.disabled = true;
    inptPrecio.disabled = true;
    filtro1.disabled == true;
    filtro2.disabled == true;
    document.getElementById("crear").disabled = false;
    document.getElementById("modificar").disabled = false;
    document.getElementById("eliminar").disabled = false;
}

document.getElementById("limpiar").addEventListener("click", function() {
    div.innerHTML = "Vista limpiada, los datos permanecen.";
    div2.innerHTML = "Vista limpiada, los datos permanecen.";
});

document.getElementById("eliminarTodo").addEventListener("click", function() {
    localStorage.removeItem("productosAlmacenados");
    productos = [];
    Producto.contadorId = 0;
    div.innerHTML = "Datos eliminados.";
});


