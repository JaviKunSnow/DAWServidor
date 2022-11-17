'use strict';
//import {sonidoActivado, velocidadDiana} from './variables_globales.js';
import { objetoDatos } from "./variables_globales.js";
import {dibujarDiana} from "./diana2.js"

function crearDivs(){
    //creo un div que va acontener a otros 4 divs
    let nuevoDiv = document.createElement('div');
    nuevoDiv.setAttribute('id', 'contenedorContadores');
    nuevoDiv.setAttribute('style', 'position: absolute; top: 540px; width: 100%');
    //document.getElementById('contenedorContadores').appendChild(nuevoDiv);
    //document.body.insertBefore(nuevoDiv, document.getElementById('contenedorHueco'));
    document.body.appendChild(nuevoDiv); //ojo!!  Se crea este div detrás de los scripts de BODY
    
    for (let i=0;i<3; i++){
        //let textoDiv=document.createTextNode(`Contador${i}`);
        nuevoDiv = document.createElement('div');
        //nuevoDiv.appendChild(textoDiv);
        //nuevoDiv.setAttribute('class', 'claseContador'); //no ha sido usada la clase
        //nuevoDiv.setAttribute('style', 'width:23%; height:150px; margin:4px; border:1px solid black; float: left');
        nuevoDiv.setAttribute('style', 'width:32%; height:150px; margin:4px; float: left');
        nuevoDiv.setAttribute('style', `${nuevoDiv.getAttribute('style')}; color: bisque; text-align: center`)
        nuevoDiv.setAttribute('height', '100px');
        nuevoDiv.setAttribute('id', `contador${i}`);
        document.getElementById('contenedorContadores').appendChild(nuevoDiv);
    }
}

const crearBotonSonido=()=>{
    let nuevoBoton= document.createElement('input');
    nuevoBoton.setAttribute('type', 'button');
    nuevoBoton.setAttribute('id', 'botonSonido');
    nuevoBoton.setAttribute('style', 'margin: 5px; cursor: pointer;');
    
    if (objetoDatos.sonidoActivado) {
        nuevoBoton.setAttribute('value', 'Sonido Off');
    } else {
        nuevoBoton.setAttribute('value', 'Sonido On');
    }
    document.getElementById('contador0').appendChild(nuevoBoton);
}

function crearAciertosFallos(){
    let nuevoDiv = document.createElement('div');
    nuevoDiv.setAttribute('id', 'idAciertos');
    nuevoDiv.innerHTML='<label for="contadorAciertos">Aciertos:</label>'+
                        '<input type="text" id="contadorAciertos" readonly> <br>'+
                        '<label for="contadorFallos">Fallos:</label>'+
                        '<input type="text" id="contadorFallos" readonly>';
    document.getElementById('contador1').appendChild(nuevoDiv);

    document.getElementById('contadorAciertos').setAttribute('style', 'width: 50px; margin: 5px')
    document.getElementById('contadorFallos').setAttribute('style', 'width: 50px; margin: 5px')
}

function crearBotonReset(){
    let nuevoBoton= document.createElement('input');
    nuevoBoton.setAttribute('type', 'button');
    nuevoBoton.setAttribute('id', 'botonReset');
    nuevoBoton.setAttribute('style', 'margin: 5px');
    nuevoBoton.setAttribute('value', 'Reset marcadores');
    document.getElementById('contador0').appendChild(nuevoBoton);
}

function crearRange(idRange,min, max, paso, labelRange, elementoPadre){
    //1º creo un contenedor float:none (para que se pongan uno debajo del otro)
    let nuevoDiv=document.createElement('div');
    nuevoDiv.setAttribute('style',' margin: 2px; float: none');
    document.getElementById(elementoPadre).appendChild(nuevoDiv);
    //2º creo etiqueta Label
    let nuevoLabel= document.createElement('label');
    let textNodo=document.createTextNode(`${labelRange}: `);
    nuevoLabel.appendChild(textNodo);
    nuevoLabel.innerHTML=labelRange;
    document.getElementById(elementoPadre).appendChild(nuevoLabel);
    let nuevoRange= document.createElement('input');
    nuevoRange.setAttribute('type', 'range');
    nuevoRange.setAttribute('min', min);
    nuevoRange.setAttribute('max', max);
    nuevoRange.setAttribute('step', paso);
    nuevoRange.setAttribute('id', idRange);
    document.getElementById(elementoPadre).appendChild(nuevoRange);
}

const crearCheckbox = (identificador, textoLabel, elementoPadre)=>{
    //1º creo un contenedor float:none (para que se pongan uno debajo del otro)
    let nuevoDiv=document.createElement('div');
    nuevoDiv.setAttribute('style',' margin: 2px; float: none');
    document.getElementById(elementoPadre).appendChild(nuevoDiv);
    //2º creo etiqueta Label
    let nuevoLabel= document.createElement('label');
    let textNodo=document.createTextNode(`${textoLabel}`);
    nuevoLabel.appendChild(textNodo);
    nuevoLabel.innerHTML=textoLabel;
    document.getElementById(elementoPadre).appendChild(nuevoLabel);
    let nuevoCb= document.createElement('input');
    nuevoCb.setAttribute('type', 'checkbox');
    nuevoCb.setAttribute('id', identificador);
    document.getElementById(elementoPadre).appendChild(nuevoCb);
}

function cambiarSonido(){
    if (objetoDatos.sonidoActivado) {
        this.value='Sonido On';
        objetoDatos.sonidoActivado = false;
    } else {
        this.value='Sonido Off';
        objetoDatos.sonidoActivado = true;
    }
}

function hacerReset(){
    objetoDatos.aciertos=0;
    objetoDatos.fallos=0;
    document.getElementById('contadorAciertos').value=objetoDatos.aciertos;
    document.getElementById('contadorFallos').value=objetoDatos.fallos;
}

function acelerarDiana(){
    console.log(typeof(this.value)); //ojo es un strind
    objetoDatos.velocidadDiana=parseInt(this.value);
    this.innerHTML+='this.value';
}

function cambiarTamanioDiana(){
    objetoDatos.diametroDiana=parseInt(this.value);
    dibujarDiana();
}

function cambiarVelFlechaX(){
    objetoDatos.xVelocidadFlecha=parseInt(this.value);
}

function comprobarCb3(){
    if (this.checked==true) {
        objetoDatos.aciertos=3;
        document.getElementById('contadorAciertos').value=3;
        document.getElementById('contenedorHueco').style.border='3px solid blue';
        //desmarco el check de 6 por si estuviera marcado
        document.getElementById('idCb6').checked=false;
    } else {
        objetoDatos.aciertos-=3; //resto 3 si se desmarca este check
    }
}

function comprobarCb6(){
    if (this.checked==true) {
        objetoDatos.aciertos=6;
        document.getElementById('contadorAciertos').value=6;
        //document.getElementById('contenedorHueco').style.border='6px double red';
        document.body.style.border='6px double blue';
    } else {
        objetoDatos.aciertos-=6; //resto 3 si se desmarca este check
    }
}

// paso 1º: crear los elementos
crearDivs();
crearBotonSonido();
crearAciertosFallos();
crearBotonReset();
crearRange('idRangeVelDiana', 0,40,0.1, 'Veloc. Diana','contador2');
crearRange('idRangeDiametroDiana',10,120,4, 'Di&aacute;metro Diana', 'contador2');
crearRange('idRangeVelFlechaX',1,24,4, 'Veloc. Arco (x)','contador2');
crearCheckbox('idCb3', '3 aciertos', 'contador1');
crearCheckbox('idCb6', '6 aciertos', 'contador1');

// paso 2º: Establecer valores iniciales de los controles
const establecerValoresIniciales = () =>{
    document.getElementById('idRangeVelDiana').value=objetoDatos.velocidadDiana;
    document.getElementById('idRangeDiametroDiana').value=objetoDatos.diametroDiana;
    document.getElementById('idRangeVelFlechaX').value=objetoDatos.xVelocidadFlecha;
}
establecerValoresIniciales();

function cambiarPuntero(){
    this.style.cursor='pointer';
}

// Paso 3º: escuchadores de eventos
document.getElementById('botonSonido').addEventListener('click',cambiarSonido);
document.getElementById('idCb3').addEventListener('change',comprobarCb3);
document.getElementById('idCb3').addEventListener('mouseover', cambiarPuntero);
document.getElementById('idCb6').addEventListener('change',comprobarCb6);
document.getElementById('botonReset').addEventListener('click',hacerReset);
document.getElementById('botonReset').addEventListener('mouseover', cambiarPuntero);
document.getElementById('idRangeVelDiana').addEventListener('change', acelerarDiana);
document.getElementById('idRangeDiametroDiana').addEventListener('change', cambiarTamanioDiana);
document.getElementById('idRangeVelFlechaX').addEventListener('change', cambiarVelFlechaX);


//setTimeout(()=>{document.getElementById('idCb3').checked = true}, 2000)  
