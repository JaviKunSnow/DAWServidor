create database zapatillas;
use zapatillas;

create table perfil (
    codigo char(3) primary key,
	descripcion varchar(30)
) engine=innodb;

create table usuarios (
    usuario CHAR(40) primary key,
    nombre VARCHAR(60) NOT NULL,
    pass CHAR(200) NOT NULL,
    correo varchar(75) NOT NULL,
    fechanac date NOT NULL,
    perfil CHAR(3) NOT NULL,
    index (perfil),
	foreign key (perfil) references perfil (codigo)
) engine=innodb;

create table producto (
    cod_producto int primary key auto_increment,
    nombre VARCHAR(40) NOT NULL,
    descripcion VARCHAR(300) NOT NULL,
    foto VARCHAR(40) NOT NULL,
    precio float(6) NOT NULL,
    stock int NOT NULL
) engine=innodb;

create table ventas (
    id_venta int primary key auto_increment,
    usuario CHAR(40) NOT NULL,
    fechacomp date NOT NULL,
    cod_producto int NOT NULL,
    cantidad int NOT NULL,
    precio_total float(6) NOT NULL,
    foreign key (usuario) references usuarios (usuario),
    foreign key (cod_producto) references producto (cod_producto)
) engine=innodb;

create table albaranes (
    id_albaran int primary key auto_increment,
    fechaalb date NOT NULL,
    cod_producto int NOT NULL,
    cantidad int NOT NULL,
    usuario CHAR(40) NOT NULL,
    foreign key (cod_producto) references producto (cod_producto),
    foreign key (usuario) references usuarios (usuario)
) engine=innodb;

insert into perfil (codigo, descripcion) values ('ADM','Administrador');
insert into perfil (codigo, descripcion) values ('MOD','Moderador');
insert into perfil (codigo, descripcion) values ('USR','Usuario normal');

insert into usuarios (usuario, nombre, pass, correo, fechanac, perfil) values ('user1', 'Rodolfo Mateos','356a192b7913b04c54574d18c28d46e6395428ab', 'user1@gmail.com', '1998-10-05', 'ADM');
insert into usuarios (usuario, nombre, pass, correo, fechanac, perfil) values ('user2', 'Paco Juarez','356a192b7913b04c54574d18c28d46e6395428ab', 'user2@gmail.com', '1998-10-05', 'MOD');
insert into usuarios (usuario, nombre, pass, correo, fechanac, perfil) values ('user3', 'Juan Francisco','356a192b7913b04c54574d18c28d46e6395428ab', 'user3@gmail.com', '1998-10-05', 'USR');

insert into producto (nombre, descripcion, foto, precio, stock) values ('Nike Air Force 1', 'El fulgor sigue vivo en las Nike Air Force 1 07, un modelo original de baloncesto con sus ya característicos revestimientos con costuras duraderas', 'airforce1.webp', '119.99', '3'); 
insert into producto (nombre, descripcion, foto, precio, stock) values ('Nike Air Max Excee', 'Inspiradas en las Nike Air Max 90, las Nike Air Max Excee rinden homenaje a un clásico con un nuevo enfoque.', 'airmaxexcee.webp', '119.99', '3');
insert into producto (nombre, descripcion, foto, precio, stock) values ('Jordan Luka 1', 'Diseñadas para el 77 y para todos los atletas que buscan la máxima velocidad y eficiencia, el debut de Luka te ofrece todo el rendimiento que necesitas.', 'luka1.webp', '109.99', '3');
insert into producto (nombre, descripcion, foto, precio, stock) values ('Air Jordan Legacy 312 Low', 'Las Air Jordan Legacy 312 rinden homenaje al legado de MJ con esta referencia al 312, el código de distrito de Chicago.', 'airjordanlegacy.webp', '139.99', '3');
insert into producto (nombre, descripcion, foto, precio, stock) values ('Nike Dunk High Retro', 'El icono del baloncesto de los 80, creado para la cancha y adaptado al estilo urbano, vuelve con los colores universitarios de las zapatillas originales.', 'nikedunkhighretro.webp', '119.99', '3');
insert into producto (nombre, descripcion, foto, precio, stock) values ('Nike Air Monarch IV', 'Las zapatillas de lifestyle y para el gimnasio Nike Air Monarch IV (extra anchas) ofrecen una amortiguación ligera, una sujeción firme y una excelente tracción.', 'airmonarchiv.webp', '74.99', '3');