window.addEventListener("load", iniciar, false);

let video;
let contador = 0;
let cont2 = 1;
function iniciar() {
    video = document.getElementById("miVideo");
    document.getElementById("idPause").addEventListener("click", stop);
    document.getElementById("idRestart").addEventListener("click", restart);
    document.getElementById("idSonidoMute").addEventListener("click", volumenMute);
    document.getElementById("idSonidoFill").addEventListener("click", volumenFill);
}

function stop() {
    video.pause();
}

function restart() {
    video.play();
}

function volumenMute() {
    if(video.muted = false) {
        video.muted = true;
    }
}

function volumenFill() {
    if(video.muted = true) {
        video.muted = false;
    }
}





