// EJERCICIO 1

// parte 1

let input1 = document.getElementById("input2");
console.log(input1);

// parte 2

let p = document.querySelectorAll("p");
console.log(p);

//parte 3

let divp = document.getElementById("lipsum");
let pa = divp.children;
console.log(pa);

let divp2 = document.querySelectorAll("div.lipsum > p");
console.log(divp2);

// parte 4

let forma = document.querySelector("form");
console.log(forma);

// parte 5

let inputs = document.getElementsByClassName("input");
let inputs2 = document.querySelectorAll("input");

console.log(inputs);
console.log(inputs);

// parte 6

let inputs3 = document.getElementsByClassName("input");
let sexo = document.getElementsByName("sexo");
console.log(sexo);
let sexo2 = document.querySelectorAll("input.sexo");
console.log(sexo2);

// parte 7

let imp = document.getElementsByClassName("important");
console.log(imp);

let imp2 = document.querySelectorAll("important");
console.log(imp2);

// EJERCICIO 2

// 1. PRIMER PARRAFO DIV LIPSUM

let div = document.getElementById("lipsum");
let primerop = div.childNodes[0];
console.log(primerop);

let div4 = document.getElementById("lipsum");
let primerop2 = div4.firstElementChild;
console.log(primerop2);

// 2. SEGUNDO PARRAFO DE DIV LIPSUM

let div3 = document.getElementById("lipsum");
let segundo = div3.childNodes[3];
console.log(segundo);

let div2 = document.getElementById("lipsum");
let segundo2 = div2.firstElementChild;
let segundo3 = segundo2.nextElementSibling;
console.log(segundo3);

// 3.  último item de la lista

let lista1 = document.getElementsByTagName("li");
let li = lista1[3];
console.log(li);

let lista2 = document.getElementsByClassName("important");
let li2 = lista2[3];
console.log(li2);

let lista3 = document.querySelector("li[class='important']:last-child");
console.log(lista3);

// 4. El ultimo label "escoge sexo"

let label = document.getElementsByTagName("label");
let la = label[3];
console.log(la);

let label4 = document.querySelector("input[name='sexo']");
let padre = label4.parentElement;
console.log(padre);

// EJERCICIO 3

// 1. El innerHTML de la etiqueta de ‘Escoge sexo’

let label2 = document.getElementsByTagName("label");
let la2 = label[3];
let lab1 = la2.innerHTML;
console.log(lab1);

let label5 = document.querySelector("input[name='sexo']");
let padre2 = label5.parentElement;
console.log(padre2.innerHTML);

// 2. El textContent de esa etiqueta

let label3 = document.getElementsByTagName("label")[3];
let lab2 = label3.textContent;
console.log(lab2);

let label6 = document.querySelector("input[name='sexo']");
let padre3 = label5.parentElement;
console.log(padre3.textContent);

// 3. El valor del primer input de sexo

let input = document.querySelector("input[name='sexo']").value;
console.log(input);



// 4. El valor del sexo que esté seleccionado (difícil, búscalo por Internet)

let valor = document.querySelector("input[name='sexo']:checked").value;
console.log(valor);



