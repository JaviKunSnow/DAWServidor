
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