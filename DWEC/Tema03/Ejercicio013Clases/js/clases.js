import { Persona } from './clases/clasePersona.js';
import { Empleado } from './clases/claseEmpleado.js';
import { Cliente } from './clases/claseCliente.js';

let person1 = new Persona("paco", "gonzalez fernandez", 20);
console.log(person1.toString());

let person2 = new Empleado("pepe", "martinez duarte", 41, 20000);
console.log(person2.toString());

let person3 = new Cliente("marta", "diaz suarez", 22);
console.log(person3.toString());

let person4 = new Empleado(person1.nombre, person1.apellido, person1.edad, 10000);
console.log(person4.toString());