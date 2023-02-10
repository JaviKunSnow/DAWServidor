const SERVER = "http://192.168.2.206:3000";

const formNaipes = document.getElementById("formNaipes");
const selectPalos = document.getElementById("idPalo");
const selectLugar = document.getElementById("idLugar");

window.addEventListener("load", async () => {

    const datosPalo = await recogerPalo();

    for await(objeto of datosPalo) {
        pintarPalo(objeto);
    }

    const datosLugar = await recogerLugar();

    for await(objeto of datosLugar) {
        pintarLugar(objeto);
    }

})

formNaipes.addEventListener("submit", async (event) => {
    event.preventDefault();
    const valorPalo = selectPalos.value;
    const valorEstado = selectLugar.value;

    const datos = await comprobarForm(valorPalo, valorEstado);

    for await(result of datos) {
        let p = document.createElement("p");
        p.appendChild(document.createTextNode(`ha elegido ${result.palo} del ${result.lugar}.`));
        document.getElementById("div04").appendChild(p);
    }

})

async function recogerPalo() {  
    const datos = await fetch(`${SERVER}/palos`, {
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

async function pintarPalo(palo) {
    let option = document.createElement("option");
    option.appendChild(document.createTextNode(palo.name));
    option.value = palo.name;
    selectPalos.appendChild(option);
}

async function recogerLugar() {  
    const datos = await fetch(`${SERVER}/estados`, {
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

async function pintarLugar(lugar) {
    let option = document.createElement("option");
    option.appendChild(document.createTextNode(lugar.name));
    option.value = lugar.name;
    selectLugar.appendChild(option);
}

async function comprobarForm(valorPalo, valorEstado) {  
    const datos = await fetch(`${SERVER}/naipes?palo=${valorPalo}&lugar=${valorEstado}`, {
        method: 'GET',
        headers: {
            'content-type': 'application/json'
        }
    })

    if (!datos.ok) {
        throw `error${dato1.status} ${dato1.statusText}`;
    }

    return datos.json();
}