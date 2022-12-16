Number.prototype.moneda = function() {
    return this.toLocaleString('de-DE', {style: 'currency', currency: 'EUR'});
};

export class Orden {
    
    static MAX_PRODUCTOS = 5;

    
    static contadorOrdenes = 0;
    
    constructor() {
        this.idOrden = ++Orden.contadorOrdenes;
        this.productos = [];
        this.contadorProductosAgregados = 0;
    }

    agregarProductos(producto) {
        if(this.contadorProductosAgregados < Orden.MAX_PRODUCTOS){
            this.productos.push(producto);
            this.contadorProductosAgregados++;
        } else {
            console.log("No caben mas productos en la Orden: " + this.idOrden.toString().padStart(3,'0'));
        }
    }

    calcularTotal() {
        let arrayTotal;
        arrayTotal = this.productos.reduce((total, producto) => 
        total += producto.precio, 0);
        return arrayTotal.moneda();
    }

    mostrarOrden() {
        return `-----------------------------
Orden: ${this.idOrden.toString().padStart(3,'0')} ${this.productos.reduce((texto, producto) => texto += `${producto.toString()}`)}
-----------------------------
Total: ${this.calcularTotal()}`
    }
}