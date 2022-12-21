let audio = document.getElementById("audio");

audio.volume = 0.4;
console.log(audio.duration);

audio.onloadedmetadata = function () {
    let p = document.createElement("p");
    p.appendChild(document.createTextNode("Duracion del audio: " + parseFloat(this.duration/60)));
    document.body.appendChild(p);
}

window.addEventListener("load", iniciar, false);

let video;
let contador = 0;
let cont2 = 1;
function iniciar() {
    video = document.getElementById("miVideo");
    document.getElementById("idPlay").addEventListener("click", play);
    document.getElementById("idPause").addEventListener("click", stop);
    document.getElementById("idRestart").addEventListener("click", restart);
    document.getElementById("idVelocidad").addEventListener("click", velocidad);
    document.getElementById("idSonido").addEventListener("click", volumen);
    document.getElementById("idResolucion").addEventListener("click", resolucion);
}


function play() {
    video.play();
}

function stop() {
    video.pause();
}

function restart() {
    video.load();
}

function velocidad() {
    video.playbackRate += 0.5;
    contador++;

    if(video.playbackRate == 2.5) {
        video.playbackRate = 1;
        contador = 1;
    }
}

function volumen() {
    if(video.muted = false) {
        video.muted = true;
    } else {
        video.muted = false;
    }
    console.log(video.muted);
}

function resolucion() {
    let tiempo = video.currentTime;
    if(this.value == "1") {
        video.src = "video/gallochulo.mp4";
    } else if(this.value == "2"){
        video.src = "video/gallopocho.mp4";
    }
    
    video.currentTime = tiempo;
    video.play();
}





