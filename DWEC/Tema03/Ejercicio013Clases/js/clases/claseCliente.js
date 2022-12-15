export class Cliente extends Persona {

    static idCliente = 300;

    constructor(nombre, apellido, edad){
        super(nombre, apellido, edad);
        super.id = ++Cliente.idCliente;
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