

const intervalo = setTimeout(mensaje, 2000);

function mensaje(){
    const ventana = window.open("", "", "width= 500, height= 400, left= 200, top= 100");
    const h1 = document.createElement("h1");
    h1.appendChild(document.createTextNode("Bienvenido mi home"));
    ventana.document.body.appendChild(h1);
    const btn = document.createElement("input");
    btn.type = "button";
    btn.value = "Cerrar ventana";
    btn.addEventListener("click", function() {
        ventana.close();
    });
    ventana.document.body.appendChild(btn);
}

