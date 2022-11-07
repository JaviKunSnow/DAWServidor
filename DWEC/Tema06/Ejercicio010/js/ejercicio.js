const celdas = Array.from(document.getElementsByTagName("td"));

const colores = ["red", "yellow", "pink", "green", "lightblue", "violet", "coral", "orange", "grey"];
let i = 1;

function pintar(){
    let color = Math.floor(Math.random() * colores.length);
    let cont = this.innerHTML;
    let letra = cont.substr(-1,1);
    this.style.backgroundColor = colores[color];
    this.innerHTML = `${i++} - ${letra}`;
}

celdas.forEach(element => {
    element.addEventListener("dblclick", pintar);
});