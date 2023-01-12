String.prototype.mayus = function() {
    return this.toUpperCase();
};

String.prototype.minus = function() {
    return this.toLowerCase();
};

Number.prototype.moneda = function() {
    return this.toLocaleString('de-DE', {style: 'currency', currency: 'EUR'});
};

export class Persona {
    static get MAX_AFORO(){
        return 106;
    }

    static contadorPersonas = 100;

    constructor(nombre, apellido, edad){
        this.id = ++Persona.contadorPersonas;
        this._nombre = nombre;
        this._apellido = apellido;
        this._edad = edad;
    }

    get nombre() {
        return this._nombre[0].mayus() + this._nombre.slice(1);
    }

    set nombre(nombre) {
        this._nombre = nombre[0].mayus() + (this._nombre.slice(1)).minus();
    }

    get apellido() {
        let Ape = Array.from(this._apellido.split(" "));
        this._apellido = "";
        Ape.forEach(palabra => {
            this._apellido += (palabra[0]).mayus() + palabra.slice(1).minus() + " ";
        });
        return this._apellido;
        /*return this._apellido[0].mayus() + this._apellido.slice(1);*/
    }

    set apellido(apellido) {
        /*this._apellido = apellido[0].mayus() + (this._apellido.slice(1)).minus();*/
        let Ape = Array.from(apellido.split(" "));
        apellido = "";
        Ape.forEach(palabra => {
            apellido += (palabra[0]).mayus() + palabra.slice(1).minus() + " ";
        });
        this._apellido = apellido;
    }

    get edad() {
        return this._edad;
    }

    set edad(edad) {
        this._edad = edad;
    }

    toString(){
        return `${this.id}: ${this.nombre}: ${this.precio.moneda()}`;
    }
};