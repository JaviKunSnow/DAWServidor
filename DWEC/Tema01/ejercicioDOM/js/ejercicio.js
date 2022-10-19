
// EJERCICIO 2

// 1. PRIMER PARRAFO DIV LIPSUM

let div = document.getElementById("lipsum");
let primerop = div.childNodes[1];
console.log(primerop);

let div4 = document.getElementById("lipsum");
let primerop2 = div4.children[0];
console.log(primerop2);

// 2. SEGUNDO PARRAFO DE DIV LIPSUM

let div3 = document.getElementById("lipsum");
let segundo = div3.childNodes[3];
console.log(segundo);

let div2 = document.getElementById("lipsum");
let segundo2 = div2.children[1];
console.log(segundo2);

// 3.  último item de la lista

let lista1 = document.getElementsByTagName("li");
let li = lista1[3];
console.log(li);

let lista2 = document.getElementsByClassName("important");
let li2 = lista2[3];
console.log(li2);

// 4. El ultimo label "escoge sexo"

let label = document.getElementsByTagName("label");
let la = label[3];
console.log(la);

// EJERCICIO 3

// 1. El innerHTML de la etiqueta de ‘Escoge sexo’

let label2 = document.getElementsByTagName("label");
let la2 = label[3];
let lab1 = la2.innerHTML;
console.log(lab1);

// 2. El textContent de esa etiqueta

let label3 = document.getElementsByTagName("label");
let la3 = label[3];
let lab2 = la2.textContent;
console.log(lab2);

// 3. El valor del primer input de sexo

let input = document.getElementsByName("sexo");
console.log(input[0].value);

let input2 = document.getElementsByTagName("input");
let inp = input2[0];
let result = inp.value;
console.log(result);

// 4. El valor del sexo que esté seleccionado (difícil, búscalo por Internet)

let valor = document.querySelector('input[sexo]:checked').value;
console.log(valor);
