// apartado a

//document.body.style.fontFamily = "arial";

document.getElementById("div01").style.fontFamily = "arial";
document.getElementById("div02").style.fontFamily = "arial";
document.getElementById("div03").style.fontFamily = "arial";
document.getElementById("div04").style.fontFamily = "arial";
document.getElementById("div01").style.backgroundColor = "aqua";
document.getElementById("div02").style.backgroundColor = "lightcoral";
document.getElementById("div03").style.backgroundColor = "lightpink";
document.getElementById("div04").style.backgroundColor = "lightskyblue";

// apartado b

let animales = [
    {
        id: 1,
        especie: "Leon",
        grupo: "Mamiferos",
        edad: 14
    },
    {
        id: 2,
        especie: "Cocodrilo",
        grupo: "Reptiles",
        edad: 50
    },
    {
        id: 3,
        especie: "Caballo",
        grupo: "Mamiferos",
        edad: 30
    },
    {
        id: 4,
        especie: "Camaleon",
        grupo: "Reptiles",
        edad: 8
    },
    {
        id: 5,
        especie: "Iguana",
        grupo: "Reptiles",
        edad: 20
    },
    {
        id: 6,
        especie: "Raton",
        grupo: "Mamiferos",
        edad: 2
    }
]

console.log(animales);

// apartado c y d

function listaOrdenada() {
    let ul = document.createElement("ul");

    animales.forEach(elemento => {
        let li = document.createElement("li");
        li.appendChild(document.createTextNode(`${elemento.especie} (${elemento.grupo}) vive unos ${elemento.edad} años`));
        ul.appendChild(li);
    })

    document.getElementById("div02").appendChild(ul);
}

listaOrdenada();

// apartado e

let botonEspecie = document.createElement("input");
botonEspecie.type = "button";
botonEspecie.value = "Ordenar Alfabetico Especie";
document.getElementById("div03").appendChild(botonEspecie);

botonEspecie.addEventListener("click", function() {

    animalesOrdenada = animales.sort(function (a, b) {
        return a.especie.localeCompare(b.especie);
    })

    animales = animalesOrdenada;
    
    document.getElementById("div02").innerHTML = "VISUALIZAR TABLA";
    listaOrdenada();
});

// apartado f

let botonEdad = document.createElement("input");
botonEdad.type = "button";
botonEdad.value = "Ordenar por Longevidad";
document.getElementById("div03").appendChild(botonEdad);

botonEdad.addEventListener("click", function() {

    animalesOrdenada = animales.sort(function (a, b) {
        return a.edad - b.edad;
    })

    animales = animalesOrdenada;
    
    document.getElementById("div02").innerHTML = "VISUALIZAR TABLA";
    listaOrdenada();
});

// apartado g

function extraerGrupos(array) {

    let grupos = [];
    array.forEach(elemento => {
        if(grupos.find(element => element == elemento.grupo)) {
        } else {
            grupos.push(elemento.grupo);
        }
    });

    return grupos;
}

let gruposAnimales = extraerGrupos(animales);

// apartado h

function añadirGrupos() {

    let p = document.createElement("p");
    p.appendChild(document.createTextNode(gruposAnimales.toString()));
    document.getElementById("div04").appendChild(p);
}

añadirGrupos();