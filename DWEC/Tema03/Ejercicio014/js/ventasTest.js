import { Orden } from "./clases/claseOrden.js";
import { Producto } from "./clases/claseProducto.js";

let p1 = new Producto("Camisa", 44.50);
console.log(p1);


let orden1 = new Orden();
orden1.agregarProductos(p1);
orden1.agregarProductos(p1);

/*let orden2 = new Orden();
orden2.agregarProductos(p2);
orden2.agregarProductos(p2);*/

console.log(orden1.mostrarOrden());