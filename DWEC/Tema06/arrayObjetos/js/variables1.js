function crearCuadrado(id, lado, fondo){
    div = document.createElement("div");
    div.appendChild(document.createTextNode("hgolassd"));
    div.setAttribute("id", id);
    div.setAttribute("style",`height: ${lado}px; width: ${lado}px; background-color: ${fondo}; float: left;`);
    document.body.appendChild(div);
}

for(let i = 0; i<10; i++){
    crearCuadrado("cuadrado1", 50, "blue");

}