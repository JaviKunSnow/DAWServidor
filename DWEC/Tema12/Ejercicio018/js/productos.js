const SERVER = "http://192.168.2.206:3000";

//const SERVER = "http://192.168.1.110:3000";

const peticion = new XMLHttpRequest();

//listar productos
window.addEventListener('load', function() {
    document.getElementById('listProduct').addEventListener('submit', async (event) => {
            event.preventDefault();
            const recibido = await getData();
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

function renderCategoria() {
    
}