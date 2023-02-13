const express = require("express");
const app = express();

app.set("port", process.env.PORT || 9000);

app.listen(app.get('port'), "192.168.2.206", ()=>{
    console.log("Servidor corriendo en puerto", app.get('port'));
})

app.get("/", (req, res) => {  
    res.send("Respuesta");
});
