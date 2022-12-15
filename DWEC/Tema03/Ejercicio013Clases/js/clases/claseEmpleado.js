export class Empleado extends Persona {

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