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
    fecha date NOT NULL,
    perfil CHAR(3) NOT NULL,
    index (perfil),
	foreign key (perfil) references perfil (codigo)
) engine=innodb;

create table producto (
    cod_producto int primary key auto_increment,
    nombre VARCHAR(40) NOT NULL,
    marca VARCHAR(20) NOT NULL,
    descripcion VARCHAR(300) NOT NULL,
    foto VARCHAR(40) NOT NULL,
    precio float(6) NOT NULL,
    stock int NOT NULL
) engine=innodb;

create table facturacion (
    id_venta int primary key auto_increment,
    usuario CHAR(40) NOT NULL,
    fecha date NOT NULL,
    cod_producto int NOT NULL,
    cantidad int NOT NULL,
    precio_total float(6) NOT NULL,
    foreign key (usuario) references usuarios (usuario),
    foreign key (cod_producto) references producto (cod_producto)
) engine=innodb;

create table pedidos (
    id_pedido int primary key auto_increment,
    fecha date NOT NULL,
    cod_producto int NOT NULL,
    cantidad int NOT NULL,
    foreign key (cod_producto) references producto (cod_producto)
) engine=innodb;
