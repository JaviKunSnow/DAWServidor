create database conciertos;
use conciertos;

create table concierto(
    id int primary key auto_increment,
    grupo varchar(40) not null,
    fecha date not null,
    precio float not null,
    lugar varchar(100)
) engine=innodb;

insert into concierto values(null, 'los planeta', '2023-02-15',25,'Auditorio ruta de la plata Zamora');
insert into concierto values(null, 'Natos y Waor', '2023-02-20',25,'Multiusos salamanca');
insert into concierto values(null, 'lOS CHICHOS', '2023-01-20',25,'sala potemking');
insert into concierto values(null, 'rihanna', '2023-03-01',25,'cueva del jazz');
