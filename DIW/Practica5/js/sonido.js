let audio = document.getElementById("audio");

audio.volume = 0.4;
console.log(audio);

let duracion = parseFloat(audio.duration);

let p = document.createElement("p");
p.appendChild(document.createTextNode("Duracion del audio: " + duracion));
document.body.appendChild(p);