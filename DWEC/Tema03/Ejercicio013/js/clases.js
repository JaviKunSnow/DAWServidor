String.prototype.mayus = function() {
    return this(0).toLocaleUpperCase();
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
        return this._nombre;
    }

    set nombre(nombre) {
        return this._nombre = nombre.mayus();
    }

    get apellido() {
        return this._apellido;
    }

    set apellido(apellido) {
        return this._apellido = apellido.mayus();
    }

    get edad() {
        return this._edad;
    }

    set edad(edad) {
        return this._edad = edad;
    }

    toString(){
        return `${this.nombre} ${this.apellido} ${this.edad} ${this.id}`;
    }
};

let person1 = new Persona("paco", "gonzalez", 20);
console.log(person1.toString());
/*
class Empleado extends Persona {
    constructor(nombre, apellido, edad, sueldo){
        super(nombre, apellido, edad);
        this.sueldo = sueldo;
    }
}

class Cliente extends Persona {
    constructor(nombre, apellido, edad, fecha){
        super(nombre, apellido, edad);
        this.fecha = fecha;
    }
}*/