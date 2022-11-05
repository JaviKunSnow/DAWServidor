
// FUNCION DEL ROMBO
function romboCambio(){
    const valor = document.getElementById("input_filas").value;
    const valorf = valor/2;
    const div = document.getElementById("divi");
    if(div.innerHTML != ""){
        div.innerHTML = "";
    }

    for(let i = 1; i <= valor; i++){
        for(let blanco = 1; blanco <= valor-i; blanco++){
            div.innerHTML += "&nbsp;&nbsp;";
        }

        for(let astericos=1; astericos <= (i*2) - 1; astericos++){
            if(astericos == 1 || astericos == (i*2)-1){
                div.innerHTML += "*";
            } else {
                div.innerHTML += "&nbsp;&nbsp;";
            }
        }
        div.innerHTML += "<br/>";
    }
    for(let i = valor; i >= 1; i--){
        for(let blanco = 1; blanco <= valor-i; blanco++){
            div.innerHTML += "&nbsp;&nbsp;";
        }

        for(let astericos=1; astericos <= (i*2)-1; astericos++){
            if(astericos == 1 || astericos == (i*2)-1){
                div.innerHTML += "*";
            } else {
                div.innerHTML += "&nbsp;&nbsp;";
            }
        }
        div.innerHTML += "<br/>";
    }
}

// FUNCIONES AGREGAR CLASES

function agregarClaseHTML(){
    document.querySelector('html').classList.add('elehtml');
    document.getElementById("boton1").value = "Quitar clase al HTML";
    document.getElementById("boton1").onclick = quitarClaseHTML;
}

function agregarClaseH1(){
    document.querySelector('h1').classList.add('eleh1');
    document.getElementById("boton2").value = "Quitar clase al H1";
    document.getElementById("boton2").onclick = quitarClaseH1;
}

function agregarClaseDiv(){
    document.querySelector('div').classList.add('caja');
    document.getElementById("boton3").value = "Quitar clase al Div";
    document.getElementById("boton3").onclick = quitarClaseDiv;
}

// FUNCIONES QUITAR CLASES

function quitarClaseHTML(){
    document.querySelector('html').classList.remove('elehtml');
    document.getElementById("boton1").value = "Agregar clase al HTML";
    document.getElementById("boton1").onclick = agregarClaseHTML;
}

function quitarClaseH1(){
    document.querySelector('h1').classList.remove('eleh1');
    document.getElementById("boton2").value = "Agregar clase al H1";
    document.getElementById("boton2").onclick = agregarClaseH1;
}

function quitarClaseDiv(){
    document.querySelector('div').classList.remove('caja');
    document.getElementById("boton3").value = "Agregar clase al Div";
    document.getElementById("boton3").onclick = agregarClaseDiv;
}