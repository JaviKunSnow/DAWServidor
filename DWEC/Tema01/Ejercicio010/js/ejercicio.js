const celdas = Array.from(document.getElementsByTagName("td"));
console.log(celdas);

let i = 1;

function pintar(){
    let cont = this.innerHTML;
    let letra = cont.substr(-1,1);
    this.style.backgroundColor = "yellow";
    this.innerHTML = `${i++} - ${letra}`;
}

celdas.forEach(element => {
    element.addEventListener("dblclick", pintar);
});