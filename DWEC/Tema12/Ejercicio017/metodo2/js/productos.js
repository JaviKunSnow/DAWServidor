const SERVER = "http://192.168.2.206:3000/productos";

//const SERVER = "http://192.168.1.110:3000/productos";

const peticion = new XMLHttpRequest();

window.addEventListener('load', function() {
    document.getElementById('addProduct').addEventListener('submit', (event) => {
        event.preventDefault();
        let id = document.getElementById("id").value;
        if(isNaN(id) || id.trim() == '') {
            alert('introduce un numero');
        } else {
            fetch(`${SERVER}/${id}`, {
                method: 'GET',
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then((response) => {
                if(!response.ok) {
                    throw `Error ${response.status} de la BD: ${response.statusText}`;
                }
                return response.json();
            })
            .then((datos) => {
                document.getElementById("lista").innerHTML = "";

                for(object in datos) {
                    let li = document.createElement("li");
                    li.className = "list-group-item";
                    li.appendChild(document.createTextNode(`${object}: ${datos[object]}`));
                    document.getElementById("lista").appendChild(li);
                }
            })

            .catch((error) => {
                alert(`Error en la peticion: ${error.message}`);
            })
        }
    })
});

window.addEventListener('load', function() {
    document.getElementById('nuevoProduct').addEventListener('submit', (event) => {
        event.preventDefault();
        const form = {
            id: '',
            nombre: document.getElementById("nombre").value,
            desc: document.getElementById("desc").value,
        }
            fetch(`${SERVER}`, {
                method: 'POST',
                body: JSON.stringify(form),
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(response => {
                if(!response.ok) {
                    throw `Error ${response.status} de la BD: ${response.statusText}`;
                }
                return response.json();
            })
            .then(datos => {
                alert("datos recibidos");
                console.log(datos);
            })

            .catch(error => {
                alert(`Error en la peticion: ${error.message}`);
            })
    })
});

//modificar productos

window.addEventListener('load', function() {
    document.getElementById('modProduct').addEventListener('submit', (event) => {
        event.preventDefault();
        
        const form = {
            [document.getElementById("opcMod").value]: document.getElementById("datosMod").value
        }
                fetch(`${SERVER}/${document.getElementById("idMod").value}`, {
                    method: 'PATCH',
                    body: JSON.stringify(form),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(response => {
                    if(!response.ok) {
                        throw `Error ${response.status} de la BD: ${response.statusText}`;
                    }
                    return response.json();
                })
                .then(datos => {
                    alert("datos modificados");
                    console.log(datos);
                })
    
                .catch(error => {
                    alert(`Error en la peticion: ${error.message}`);
                })

        }
    )
});

//listar productos
window.addEventListener('load', function() {
    document.getElementById('listarProduct').addEventListener('submit', (event) => {
        event.preventDefault();

            fetch(`${SERVER}`, {
                method: 'GET',
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then((response) => {
                if(!response.ok) {
                    throw `Error ${response.status} de la BD: ${response.statusText}`;
                }
                return response.json();
            })
            .then((datos) => {
                document.getElementById("tabla").innerHTML = "";

                datos.forEach(element => {
                    let tr = document.createElement("tr");
                    let th = document.createElement("th");
                    let th2 = document.createElement("th");
                    let th3 = document.createElement("th");
                    th.appendChild(document.createTextNode(element['id']));
                    th2.appendChild(document.createTextNode(element['nombre']));
                    th3.appendChild(document.createTextNode(element['desc']));
                    tr.appendChild(th);
                    tr.appendChild(th2);
                    tr.appendChild(th3);
                    document.getElementById("tabla").appendChild(tr);
                });
                //document.getElementById("p1").innerHTML= Object.values(datos);
            })

            .catch((error) => {
                alert(`Error en la peticion: ${error.message}`);
            })
        }
    )
});