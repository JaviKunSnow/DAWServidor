



const peticion = new XMLHttpRequest();
const SERVER = "http://localhost:3000/peliculas";
/*
peticion.open('GET', 'http://localhost:3000/peliculas');
peticion.send();

peticion.addEventListener('readystatechange', function() {
    let peliculas = JSON.parse(peticion.responseText);
    
    console.log(peliculas);
})
*/
/*
peticion.onreadystatechange = () => {
    if(peticion.readyState === 4) {
        if(peticion.status === 200) {
            console.log(JSON.parse(peticion.responseText));
        }
    }
}*/
window.addEventListener('load', function() {
    document.getElementById('peliculas').addEventListener('submit', (event) => {
        event.preventDefault(); // anula lo que tenga por defecto
        const form = {
            "nombre": document.getElementById("nombre").value,
            "desc": document.getElementById("director").value
        }
            fetch(`${SERVER}`, {
                method: 'POST',
                body: JSON.stringify(form),
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
                alert("datos recibidos");
            })

            .catch((error) => {
                alert(`Error en la peticion: ${error.message}`);
            })
    })
});

/*
document.getElementById("pelicula").addEventListener('submit', function() {

    const peticion3 = new XMLHttpRequest();
    peticion3.open('GET', 'http://localhost:3000/peliculas/' + document.getElementById("id").value);
    peticion3.send();
    peticion3.onreadystatechange = () => {
        if(peticion.readyState === 4) {
            if(peticion.status === 200) {
                console.log(JSON.parse(peticion.responseText));
            }
        }
    }
})
*/



