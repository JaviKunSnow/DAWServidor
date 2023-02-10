
const SERVER = "http://192.168.2.206:3000";
const botonIniciar = document.createElement("input");
botonIniciar.type = "button";
botonIniciar.value = "iniciar";

const arrayPalos = ["oros", "copas", "espadas", "bastos"];
const arrayEstados = ["mazo", "jugador1", "jugador2", "jugador3", "jugador4", "descarte"];
const parrafo = document.createElement("p");

document.getElementById("div03").appendChild(botonIniciar);

botonIniciar.addEventListener("click", async () => {
    for await(palo of arrayPalos) {
        const palos = {
            id: '',
            name: palo
        }

        await addPalos(palos);
    }

    for await(estado of arrayEstados) {
        const estados = {
            id: '',
            name: estado
        }
        
        await addEstados(estados);
    }

    for await(palo of arrayPalos) {
        for(let i = 1; i<13; i++) {
            const naipe = {
                id: '',
                palo: palo,
                carta: i,
                lugar: "mazo"
            }
            
            await addNaipe(naipe);
        }
    }

    botonIniciar.disabled = await true;
})

async function addPalos(palos) {
    const datos = await fetch(`${SERVER}/palos`, {
        method: 'POST',
        body: JSON.stringify(palos),
        headers: {
            'content-type': 'application/json'
        }
    })
    return await datos.json();
}

async function addEstados(estados) {
    const datos = await fetch(`${SERVER}/lugar`, {
        method: 'POST',
        body: JSON.stringify(estados),
        headers: {
            'content-type': 'application/json'
        }
    })
    return await datos.json();
}

async function addNaipe(naipe) {
    const datos = await fetch(`${SERVER}/naipes`, {
        method: 'POST',
        body: JSON.stringify(naipe),
        headers: {
            'content-type': 'application/json'
        }
    })

    const nuevosdatos = await datos.json();

    listarNaipes(nuevosdatos);

}

async function listarNaipes(naipe) {
    parrafo.innerHTML += `${naipe.carta} de ${naipe.palo} | `;
    document.getElementById("div01").appendChild(parrafo);
}