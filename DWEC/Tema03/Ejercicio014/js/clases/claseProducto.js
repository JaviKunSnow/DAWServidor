Number.prototype.moneda = function() {
    return this.toLocaleString('de-DE', {style: 'currency', currency: 'EUR'});
};

export class Producto {
    
    static contadorProductos = 0;

    constructor(nombre, precio) {
        this._idProducto = ++Producto.contadorProductos;
        this._nombre = nombre;
        this._precio = precio;
    }

    get nombre() {
        return this._nombre;
    }

    set nombre(nombre) {
        this._nombre = nombre;
    }

    get precio() {
        return this._precio;
    }

    set precio(precio) {
        this._precio = precio;
    }

    toString() {
        return `\n\t- ${this.nombre} ${this.precio.moneda()}`;
    }
}