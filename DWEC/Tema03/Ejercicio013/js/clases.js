String.prototype.mayus = function() {
    return this.toUpperCase();
};

String.prototype.minus = function() {
    return this.toLowerCase();
};

Number.prototype.moneda = function() {
    return this.toLocaleString('de-DE', {style: 'currency', currency: 'EUR'});
};

class Persona {
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
    }

    set apellido(apellido) {
        this._apellido = apellido;
        let Ape = Array.from(this._apellido.split(" "));
        this._apellido = "";
        Ape.forEach(palabra => {
            this._apellido += (palabra[0]).mayus() + palabra.slice(1).minus() + " ";
        });
    }

    get edad() {
        return this._edad;
    }

    set edad(edad) {
        this._edad = edad;
    }

    toString(){
        return `${this.id}: \n\t\t ${this.nombre} ${this.apellido} \n\t\t edad: ${this.edad}`;
    }
};

let person1 = new Persona("paco", "gonzalez fernandez", 20);
console.log(person1.toString());


class Empleado extends Persona {

    static idEmpleados = 200;

    constructor(nombre, apellido, edad, sueldo){
        super(nombre, apellido, edad);
        super.id = ++Empleado.idEmpleados;
        this._sueldo = sueldo;
    }

    get sueldo() {
        return this._sueldo;
    }

    set sueldo(sueldo) {
        this._sueldo = sueldo;
    }

    toString() {
        return `Empleado ${super.toString()} \n\t\t Sueldo: ${this._sueldo.moneda()}`;
    }
}

let person2 = new Empleado("pepe", "martinez duarte", 41, 20000);
console.log(person2.toString());


class Cliente extends Persona {

    static idCliente = 300;

    constructor(nombre, apellido, edad){
        super(nombre, apellido, edad);
        this._id = ++Cliente.idCliente;
        this._fecha = this.fechaActual();
    }

    fechaActual() {
        let hoy = new Date();
        return hoy.toLocaleDateString("es-ES");
    }

    toString() {
        return `Cliente ${super.toString()} \n\t\t Registro: ${this._fecha}`;
    }
}

let person3 = new Cliente("marta", "diaz suarez", 22);
console.log(person3.toString());