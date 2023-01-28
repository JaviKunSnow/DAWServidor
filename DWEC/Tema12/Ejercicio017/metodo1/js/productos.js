//const SERVER = "http://192.168.2.206:3000/productos";

const SERVER = "http://192.168.1.110:3000/productos";

const peticion = new XMLHttpRequest();

// listar producto por id
window.addEventListener('load', function() {
    document.getElementById('addProduct').addEventListener('submit', (event) => {
        event.preventDefault(); // anula lo que tenga por defecto
        let id = document.getElementById("id").value;
        getProd(id)
        .then((datos) => {
            if(document.getElementById("lista").innerHTML != "") {
                document.getElementById("lista").innerHTML = "";
            }

            for(object in datos) {
                let li = document.createElement("li");
                li.className = "list-group-item";
                li.appendChild(document.createTextNode(`${object}: ${datos[object]}`));
                document.getElementById("lista").appendChild(li);
            }
        })
        .catch((error) => {
            console.error(error);
        })
        
    })
});

function getProd(id) {
    return new Promise((resolve, eject) => {
        peticion.open('GET', `${SERVER}/${id}`, true);
        peticion.send();
    
        peticion.addEventListener('load', function() {
            if(peticion.status === 200) {
                resolve(JSON.parse(peticion.responseText));
                
            } else {
                eject('error: ' + peticion.status);
            }
        })
    })
}
// nuevo producto

window.addEventListener('load', function() {
    document.getElementById('nuevoProduct').addEventListener('submit', (event) => {
        event.preventDefault();
        const form = {
            id: '',
            nombre: document.getElementById("nombre").value,
            desc: document.getElementById("desc").value,
        }
        
        nuevoProd(form)
        .then((datos) => {
            alert("datos recibidos");
            console.log(datos);
        })
        .catch((error) => {
            console.error(error);
        })
        
    })
});

function nuevoProd(prod) {
    return new Promise((resolve, eject) => {
        peticion.open('POST', `${SERVER}`, true);
        peticion.send(JSON.stringify(prod));
    
        console.log(JSON.stringify(prod));
        peticion.addEventListener('load', function() {
            if(peticion.status === 201) {
                resolve(JSON.parse(peticion.responseText));
                
            } else {
                eject('error: ' + peticion.status);
            }
        })
    })
}
// listar todos los productos
function listarProd() {
    return new Promise((resolve, eject) => {
        peticion.open('GET', `${SERVER}`, true);
        peticion.send();
    
        peticion.addEventListener('load', function() {
            if(peticion.status === 200) {
                resolve(JSON.parse(peticion.responseText));
                
            } else {
                eject('error: ' + peticion.status);
            }
        })
    })
}

window.addEventListener('load', function() {
    document.getElementById('listarProduct').addEventListener('submit', (event) => {
        event.preventDefault();

        listarProd()
        .then((datos) => {
            if(document.getElementById("tabla").innerHTML != "") {
                document.getElementById("tabla").innerHTML = "";
            }

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
        })
        .catch((error) => {
            console.error(error);
        })
        
    })
});
