'use strict';
//import {sonidoActivado, velocidadDiana} from './variables_globales.js';
import { objetoDatos } from "./variables_globales.js";

let intervalFlecha;
let intervalDiana;
let disparoEfectuado=false;
//let sonidoActivado=true;
//let diametroDiana=40;
//let velocidadDiana=10;
let xDiana=0;
let yDiana=0;
const flecha= document.getElementById('contenedorFlecha');
//let xVelocidadFlecha=4;
//let yVelocidadFlecha=18;
let xFlecha=0;
let yFlecha=500;



function dibujarDiana(){
    document.getElementById('contenedorDiana').style.position='absolute';
    document.getElementById('contenedorDiana').style.width=`${objetoDatos.diametroDiana}px`;
    document.getElementById('contenedorDiana').style.height=`${objetoDatos.diametroDiana}px`;
    document.getElementById('contenedorDiana').style.backgroundColor='yellow';
    document.getElementById('contenedorDiana').style.border=`${objetoDatos.diametroDiana/5}px`;
    document.getElementById('contenedorDiana').style.borderColor='red';
    document.getElementById('contenedorDiana').style.borderStyle='solid';
    document.getElementById('contenedorDiana').style.borderRadius='50%';
    //yDiana=parseInt(document.getElementById('contenedorDiana').style.top);
    yDiana= document.getElementById('contenedorDiana').getBoundingClientRect().top;
    yDiana += objetoDatos.diametroDiana/2 + objetoDatos.diametroDiana/5;
    document.getElementById('centroDiana').style.position='absolute';
    document.getElementById('centroDiana').style.width=`${objetoDatos.diametroDiana/2}px`;
    document.getElementById('centroDiana').style.height=`${objetoDatos.diametroDiana/2}px`;
    document.getElementById('centroDiana').style.backgroundColor='red';
    document.getElementById('centroDiana').style.left=`${objetoDatos.diametroDiana/4}px`;
    document.getElementById('centroDiana').style.top=`${objetoDatos.diametroDiana/4}px`;
    document.getElementById('centroDiana').style.borderRadius='50%';
}
const desplazarDiana=() => {
    xDiana += objetoDatos.velocidadDiana;
    document.getElementById('contenedorDiana').style.left=`${xDiana}px`;
    document.getElementById('contenedorDiana').style.top=`${yDiana}px`;
    if((xDiana+objetoDatos.diametroDiana) >= document.documentElement.clientWidth -20){ //da la vuelta
        objetoDatos.velocidadDiana= objetoDatos.velocidadDiana * (-1);
    }
    
    if(xDiana <= 0 ) { //da la vuelta
        objetoDatos.velocidadDiana= objetoDatos.velocidadDiana * (-1);
    }
}

function dibujarFlecha(ancho, alto, color){
    document.getElementById('contenedorFlecha').style.width=`${ancho}px`;
    document.getElementById('contenedorFlecha').style.height=`${alto}px`;
    document.getElementById('contenedorFlecha').style.backgroundColor=color;
    document.getElementById('contenedorFlecha').style.position= 'absolute';
    xFlecha=document.documentElement.clientWidth /2;
    document.getElementById('contenedorFlecha').style.left=`${xFlecha}px`;
}

function desplazarFlecha(){
    yFlecha-=objetoDatos.yVelocidadFlecha;
    flecha.style.top=`${yFlecha}px`;
    if(yFlecha < 0){  //ha llegado arriba
        yFlecha = 500;
        clearInterval(intervalFlecha);
        clearInterval(intervalDiana);
        //comenzar();
    } 
    flecha.style.top=`${yFlecha}px`;

    //if ((yFlecha <= yDiana) && (yFlecha <= (yDiana + objetoDatos.diametroDiana/2 + objetoDatos.diametroDiana/5))){ //Flecha llega a la altura de la diana
    if ((yFlecha <= (yDiana + objetoDatos.diametroDiana/2 + objetoDatos.diametroDiana/5)) && (yFlecha >= yDiana)){ //Flecha llega a la altura de la diana
        if ((xFlecha >= xDiana) && (xFlecha <= xDiana+objetoDatos.diametroDiana)) { //ACIERTO
            if(objetoDatos.sonidoActivado) document.getElementById("audio_acierto").play();
            clearInterval(intervalFlecha);
            clearInterval(intervalDiana);
            objetoDatos.aciertos ++;   //NUEVO DIANA4
            document.getElementById('contadorAciertos').value=objetoDatos.aciertos;
            if(objetoDatos.aciertos==3){
                document.getElementById('idCb3').checked=true;
                document.getElementById('contenedorHueco').style.border='3px solid red';
            }
            if(objetoDatos.aciertos==6){
                document.getElementById('idCb6').checked=true;
                document.getElementById('contenedorHueco').style.border='6px double red';
            }
            if (objetoDatos.aciertos % 3 == 0){ //mútiplos de 3
                console.log('rojo');
                objetoDatos.yVelocidadFlecha /= 2;
            }
        } else { //FALLO
            if(objetoDatos.sonidoActivado) document.getElementById("audio_error").play();
            objetoDatos.fallos++;
            document.getElementById('contadorFallos').value=objetoDatos.fallos;
        }

    }
}

const disparar = ()=>{
    disparoEfectuado=true;
    flecha.style.backgroundColor='brown'
    if(objetoDatos.sonidoActivado) document.getElementById("audio_cerca").play();
    intervalFlecha=setInterval(desplazarFlecha, 50);
    console.log('yFlecha: '+yFlecha);

}
function escucharTeclas(evento){
    console.log('tecla: ' + evento.key);
    switch (evento.key) {
        case 'ArrowLeft' :
            xFlecha -= objetoDatos.xVelocidadFlecha;
            flecha.style.left=`${xFlecha}px`;
            break;
    
        case 'ArrowRight':
            xFlecha += objetoDatos.xVelocidadFlecha;
            flecha.style.left=`${xFlecha}px`;
            break;
         
        case ' ':
            disparar();
            break;
        
        case 'ArrowUp':
            if (!disparoEfectuado){
                disparar();
            }  
            break;
    }
}
function comenzar(){
    console.log('comenzar');
    document.getElementById('contenedorHueco').style.height='400px';
    //document.getElementById('contenedorHueco').style.backgroundColor='bisque';
    //document.getElementsByTagName('header')[0].style.backgroundColor='cyan';
    dibujarDiana();
    dibujarFlecha(5,35,'blue');
    flecha.style.top=`${yFlecha}px`
    intervalDiana=setInterval(desplazarDiana, 50);
    document.body.addEventListener('keydown', escucharTeclas);
}

document.addEventListener('load', comenzar());

export {dibujarDiana};
//export {sonidoActivado, velocidadDiana};