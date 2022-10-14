

function calcularA(){
    const forma = document.getElementById("forma");
    const n = parseInt(forma["numeroA"].value);
    const l = parseInt(forma["numeroB"].value);
    console.log(n);
    console.log(l);
    if(isNaN(n)){
        document.getElementById("resultado").value="Numero A no es un numero";
    } else if(isNaN(l)){
        document.getElementById("resultado").value="Numero B no es un numero";
    } else {
        document.getElementById("resultado").value = n+l;
    }  

        
    
    console.log("Resultado de la suma: " + Suma(n,l));
}

function calcularB(){
    const forma = document.getElementById("forma");
    const n = parseInt(forma["numeroA"].value);
    const l = parseInt(forma["numeroB"].value);
    if(isNaN(n)){
        document.getElementById("resultado").value="Numero A no es un numero";
    } else if(isNaN(l)){
        document.getElementById("resultado").value="Numero B no es un numero";
    } else {
        document.getElementById("resultado").value = n-l;
    }  

    console.log("Resultado de la suma: " + n-l);
}

function calcularC(){
    const forma = document.getElementById("forma");
    const n = parseInt(forma["numeroA"].value);
    const l = parseInt(forma["numeroB"].value);
    if(isNaN(n)){
        document.getElementById("resultado").value="Numero A no es un numero";
    } else if(isNaN(l)){
        document.getElementById("resultado").value="Numero B no es un numero";
    } else {
        document.getElementById("resultado").value = n*l;
    } 

    console.log("Resultado de la suma: " + n*l);
}

function calcularD(){
    const forma = document.getElementById("forma");
    const n = parseInt(forma["numeroA"].value);
    const l = parseInt(forma["numeroB"].value);
    if(isNaN(n)){
        document.getElementById("resultado").value="Numero A no es un numero";
    } else if(isNaN(l)){
        document.getElementById("resultado").value="Numero B no es un numero";
    } else {
        document.getElementById("resultado").value = n/l;
    }  
    console.log("Resultado de la suma: " + n/l);
}