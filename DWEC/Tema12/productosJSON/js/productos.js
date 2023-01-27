const SERVER = "http://192.168.2.206:3000/productos";

const peticion = new XMLHttpRequest();

/*function getProd(idProd) {
    peticion.open('GET', `${SERVER}/${idProd}`, true);
    peticion.send();

    peticion.addEventListener('load', function() {
        if(peticion.status === 200) {
            const resultado = JSON.parse(peticion.responseText);
            return resultado;
        } else {
            console.error('error: ' + peticion.status);
        }
    })
}

window.addEventListener('load', function() {
    document.getElementById('addProduct').addEventListener('submit', (event) => {
        event.preventDefault(); // anula lo que tenga por defecto
        let id = document.getElementById("id").value;
        getProd(id)
        .then((datos) => {
            document.getElementById("p1").innerHTML= Object.values(datos);
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
 */
/*
window.addEventListener('load', function() {
    document.getElementById('addProduct').addEventListener('submit', (event) => {
        event.preventDefault(); // anula lo que tenga por defecto
        let id = document.getElementById("id").value;
        if(isNaN(id) || id.trim() == '') {
            alert('introduce un numero');
        } else {
            fetch(`${SERVER}/${id}`)
                .then((response) => response.json())
                .then((datos) => {
                    document.getElementById("p1").innerHTML= Object.values(datos);
                })
                .catch((error) => console.error(error))
        }
    })
});
*/

window.addEventListener('load', function() {
    document.getElementById('addProduct').addEventListener('submit', (event) => {
        event.preventDefault(); // anula lo que tenga por defecto
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
                if(document.getElementById("lista").innerHTML != "") {
                    document.getElementById("lista").innerHTML = "";
                }

                for(object in datos) {
                    let li = document.createElement("li");
                    li.className = "list-group-item";
                    li.appendChild(document.createTextNode(`${object}: ${datos[object]}`));
                    document.getElementById("lista").appendChild(li);
                }
                //document.getElementById("p1").innerHTML= Object.values(datos);
            })

            .catch((error) => {
                alert(`Error en la peticion: ${error.message}`);
            })
        }
    })
});

window.addEventListener('load', function() {
    document.getElementById('nuevoProduct').addEventListener('submit', (event) => {
        event.preventDefault(); // anula lo que tenga por defecto
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

window.addEventListener('load', function() {
    document.getElementById('listarProduct').addEventListener('submit', (event) => {
        event.preventDefault(); // anula lo que tenga por defecto

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
                //document.getElementById("p1").innerHTML= Object.values(datos);
            })

            .catch((error) => {
                alert(`Error en la peticion: ${error.message}`);
            })
        }
    )
});


/*
$("#nuevoProduct").submit(function(event) { 
    event.preventDefault();
    const form = {
        nombre: document.getElementById("nombre").value,
        desc: document.getElementById("desc").value
    }

    const form2 = new FormData(document.getElementById("nuevoProduct"));

    $.ajax({
        type: "POST",
        url: SERVER,
        data: form,
        dataType: "json",
        contentType: 'multipart/form-data',
        success: function (response) {
            console.log(response);
        }
    });
    
    
})

*/