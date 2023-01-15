
export class Producto {

    static contadorId = 0;

    constructor(nombre, precio){
        this.id = ++Producto.contadorId;
        this._nombre = nombre;
        this._precio = precio;
    }

    get nombre() {
        return this._nombre.toUpperCase();;
    }

    set nombre(nombre) {
        this._nombre = nombre.toUpperCase();
    }
    // Nose por que no me funciona la conversion a moneda
    get precio() {
        return this._precio.toLocaleString('es-ES', {style: 'currency', currency: 'EUR'});
    }

    set precio(precio) {
        this._precio = precio;
    }
    // tambien lo he probado aqui y no me funciona
    toString() {
        return `${this.id}: ${this.nombre} :${this.precio}€`;
    }
};