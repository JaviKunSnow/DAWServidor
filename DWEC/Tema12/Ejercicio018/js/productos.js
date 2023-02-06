const SERVER = "http://192.168.2.206:3000";

//const SERVER = "http://192.168.1.110:3000";

const peticion = new XMLHttpRequest();

const ol = document.getElementById("lista");
const olInf = document.createElement("ol");
olInf.className = "list-group list-group-numbered bg-primary";
const olGan = document.createElement("ol");
olGan.className = "list-group list-group-numbered bg-primary";

//listar productos
window.addEventListener('load', function() {
    document.getElementById('listProduct').addEventListener('submit', async (event) => {
            event.preventDefault();
            await getData();
            console.log(renderCategoria);
            console.log(renderProducto);

        }
    )
});

async function getTable(tabla) {
    const respuesta = await fetch(SERVER + tabla)
    if (!respuesta.ok) {
        throw `Error ${respuesta.status} de la BBDD: ${respuesta.statusText}`
    }
    const datos = await respuesta.json()
    return datos;
}

async function getData() {
    const [categorias, productos] = await Promise.all([
        getTable("/categorias"),
        getTable("/productos")
    ]);

    categorias.forEach((categoria) => renderCategoria(categoria));
    productos.forEach((producto) => renderProducto(producto));
}

function renderCategoria(categoria) {
    const li = document.createElement("li");
    li.className = "list-group-item";
    li.id = categoria.id;
    li.appendChild(document.createTextNode(categoria.name));
    ol.appendChild(li);
}

function renderProducto(producto) {
    const li = document.createElement("li");
    li.className = "list-group-item";
    li.appendChild(document.createTextNode(producto.name));
    if(producto.cat == document.getElementById("1").id) {
        olInf.appendChild(li);
    } else if(producto.cat == document.getElementById("2").id) {
        olGan.appendChild(li);
    }

    document.getElementById("1").appendChild(olInf);
    document.getElementById("2").appendChild(olGan);
}

document.getElementById("borrar").addEventListener("click", () => {
    ol.innerHTML = "";
    olInf.innerHTML = "";
    olGan.innerHTML = "";
})