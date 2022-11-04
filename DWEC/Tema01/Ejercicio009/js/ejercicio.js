const celdas = Array.from(document.getElementsByTagName("td"));
console.log(celdas);

function pintar(){
    this.style.backgroundColor = "yellow";
}

celdas.forEach(element => {
    element.addEventListener("dblclick", pintar);
});