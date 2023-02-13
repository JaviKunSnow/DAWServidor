const express = require("express");
const app = express();

const mysql = require('mysql2');
const myconn= require('express-myconnection');

const rutas= require('./routes');

const dbOptions= {
    //propiedad host donde se ubica la base de datos Mysql
    host: 'localhost',
    //propiedad puerto donde escucha mysql (por defecto es 3306)
    port: 3306,
    //usuario base de datos (por defecto root)
    user: 'javier',
    //contraseña del usuario
    password: 'javier',
    //nombre del esquema al que nos vamos a conectar
    database: 'comercio'
}

app.set("port", process.env.PORT || 9000);
app.use(myconn(mysql, dbOptions, 'single'));
app.use('/api', rutas);


app.listen(app.get('port'), "192.168.2.206", ()=>{
    console.log("Servidor corriendo en puerto", app.get('port'));
})

app.get("/", (req, res) => {  
    res.send("Respuesta");
});
