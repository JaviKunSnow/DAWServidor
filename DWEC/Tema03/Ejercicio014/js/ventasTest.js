import { Orden } from "./clases/claseOrden.js";
import { Producto } from "./clases/claseProducto.js";

let p1 = new Producto("Camisa", 44.50);
let p2 = new Producto("Calcetines", 5.50);
let p3 = new Producto("Sudadera", 30.99);
let p4 = new Producto("Pantalon", 15.99);
let p5 = new Producto("Chaqueta", 50.99);

let orden1 = new Orden();
orden1.agregarProductos(p1);
orden1.agregarProductos(p2);
orden1.agregarProductos(p3);

let orden2 = new Orden();
orden2.agregarProductos(p1);
orden2.agregarProductos(p2);
orden2.agregarProductos(p2);
orden2.agregarProductos(p3);
orden2.agregarProductos(p4);
orden2.agregarProductos(p5);

console.log(orden1.mostrarOrden());
console.log(orden2.mostrarOrden());