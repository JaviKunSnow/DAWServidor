let inputTexto = document.getElementById("texto");



function almacenar() {
    localStorage.texto = inputTexto.value;
}

function respuesta() {
    inputTexto.value = localStorage.texto;
}


window.addEventListener("change", almacenar);
window.addEventListener("load", respuesta);