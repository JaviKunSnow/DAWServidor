const express= require('express');

const routes = express.Router();

module.exports = routes;

routes.get('/', (req, res)=>{
    res.send ("respuesta a la segunda ruta");
})