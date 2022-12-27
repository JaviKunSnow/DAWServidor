create database zapatillas;
use zapatillas;

create table usuarios (
    usuario CHAR(40) primary key,
    pass CHAR(40) NOT NULL,
    correo varchar(75) NOT NULL,
    fechanac date NOT NULL,
    perfil CHAR(3) NOT NULL,
) engine=innodb;

create table producto (
    cod_producto int primary key auto_increment,
    descripcion VARCHAR(30) NOT NULL,
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
    foreign key (usuarios) references usuarios (usuario),
    foreign key (producto) references perfil (cod_producto)
) engine=innodb;

create table albaranes (
    id_albaran int primary key auto_increment,
    fechaalb date NOT NULL,
    cod_producto int NOT NULL,
    cantidad int NOT NULL,
    usuario CHAR(40) NOT NULL,
    foreign key (producto) references perfil (cod_producto),
    foreign key (usuarios) references usuarios (usuario)
) engine=innodb;

insert into usuarios (usuario, clave, fechanac, perfil) values ('user1', '356a192b7913b04c54574d18c28d46e6395428ab', 'user1@gmail.com', '1998-10-05', 'ADM');