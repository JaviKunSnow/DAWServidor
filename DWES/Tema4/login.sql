CREATE DATABASE login;
USE login;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `rol` varchar(20) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `idUsuario_UNIQUE` (`idUsuario`),
  KEY `rol_idx` (`rol`),
  CONSTRAINT `rol` FOREIGN KEY (`rol`) REFERENCES `roles` (`rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `roles` VALUES ('adm','administrador'),('ar1','arduino1'),('ar2','arduino2'),('ar3','arduino3'),('ar4','arduino4');
INSERT INTO `usuarios` VALUES ('admin','admin','','adm'),('usuario1','usuario1','Javi','ar1'),('usuario2','usuario2','Lázaro','ar2'),('usuario3','usuario3','Lucía','ar3'),('usuario4','usuario4','Manu','ar4');