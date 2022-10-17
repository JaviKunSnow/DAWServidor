// parte 1

let input = document.getElementById("input2");
console.log(input);

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