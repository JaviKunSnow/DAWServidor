// almacenamiento local

localStorage.setItem("uno", "primero");
localStorage.dos = "segundo";
localStorage['tres'] = "tercerp";

let array1 = [
    localStorage.uno,
    localStorage["dos"],
    localStorage.getItem("tres")
];

localStorage.array1 = array1;
localStorage.array2 = JSON.stringify(array1);

let array3 = JSON.parse(localStorage.array2); 

