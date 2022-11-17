'use strict';
const parrafo = Array.from(document.getElementsByTagName("p"));


parrafo.forEach(element => {
        element.style.color = "red";
});

let h1Primero = document.getElementsByTagName("h1")[0];

h1Primero.setAttribute("style", "color: green; font-size: 100px;")

let h2 = document.querySelector("h2");
h2.style.backgroundColor = "yellow";

const div = document.getElementById("div");
div.setAttribute("style", "position: absolute; background-color: red; height: 40px; width: 40px;");
div.draggable = true;
