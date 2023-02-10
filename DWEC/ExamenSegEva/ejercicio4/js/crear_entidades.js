const SERVER = "http://192.168.2.206:3000";
// creo el boton
const botonReparto = document.createElement("input");
botonReparto.type = "button";
botonReparto.value = "reparto";
document.getElementById("div03").appendChild(botonReparto);

// creo 4 parrafos para recibir las cartas
const parrafo1 = document.createElement("p");
const parrafo2 = document.createElement("p");
const parrafo3 = document.createElement("p");
const parrafo4 = document.createElement("p");

// creo un array de jugadores
const jugadores = ["jugador1", "jugador2", "jugador3", "jugador4"];

// creo el evento del boton
botonReparto.addEventListener("click", async () => {

    // recorro el array de jugadores
    for await(jugador of jugadores) {
        for(i = 0; i<4; i++) {
            const json = {
                lugar: jugador
            }
            
            const id = Math.ceil(Math.random() * 40);

            await cambiarNaipes(id, json);
        }

    }

    for await(jugador of jugadores) {
        const nuevoDato = await recogerNaipes(jugador);
        for await(objeto of nuevoDato) {
            await listarNaipes(objeto);
        }
    }

})

async function cambiarNaipes(id, json) {
    const datos = await fetch(`${SERVER}/naipes/${id}`, {
        method: 'PATCH',
        body: JSON.stringify(json),
        headers: {
            'content-type': 'application/json'
        }
    })

    return await datos.json();
}

async function recogerNaipes(jugador) {
    const datos = await fetch(`${SERVER}/naipes?lugar=${jugador}`, {
        method: 'GET',
        headers: {
            'content-type': 'application/json'
        }
    })

    if (!datos.ok) {
        throw `error${datos.status} ${datos.statusText}`;
    }

    return await datos.json();
    
}

async function listarNaipes(naipe) {
    if(naipe.lugar == "jugador1") {
        parrafo1.innerHTML += `${naipe.carta} de ${naipe.palo} | `;
        document.getElementById("divJug1").appendChild(parrafo1);
    } else if(naipe.lugar == "jugador2") {
        parrafo2.innerHTML += `${naipe.carta} de ${naipe.palo} | `;
        document.getElementById("divJug2").appendChild(parrafo2);
    } else if(naipe.lugar == "jugador3") {
        parrafo3.innerHTML += `${naipe.carta} de ${naipe.palo} | `;
        document.getElementById("divJug3").appendChild(parrafo3);
    } else if(naipe.lugar == "jugador4") {
        parrafo4.innerHTML += `${naipe.carta} de ${naipe.palo} | `;
        document.getElementById("divJug4").appendChild(parrafo4);
    }
}