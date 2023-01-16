drop database if exists padel;
create database if not exists padel;
use padel;

create table perfil (
	codigo char(5) primary key,
	descripcion varchar(30)
) engine=innodb;

create table usuarios (
	usuario varchar(100)  primary key,
    nombre varchar(75),
    apellidos varchar(125),
	clave varchar(40) not null,
	email varchar(75) not null,
	fecha_nacimiento date not null,
	perfil varchar(5) not null,
    medias int(5),
	foreign key (perfil) references perfil (codigo)
) engine=innodb;

 create table pistas(
	id_pista int auto_increment primary key,
    nombre_pista varchar(50) not null,
	img_pista varchar(200)
 )engine=innodb;
 
create table reservas(
	id_reserva int auto_increment primary key,
	id_pista int (5) not null,
	fecha_reserva date,
    hora_reserva varchar(100),
    reservado boolean not null,
	usuario char(100),
	foreign key (id_pista) references pistas (id_pista),
	foreign key (usuario) references usuarios (usuario)
)engine=innodb;

create table partidos(
	id_partido int auto_increment primary key,
	id_reserva int,
    jugador1 varchar(100),
    jugador2 varchar(100),
    jugador3 varchar(100),
    jugador4 varchar(100),
	foreign key (id_reserva) references reservas (id_reserva)
)engine=innodb;

create table partidos_resultado(
	id_resultado int auto_increment primary key,
	id_partido int,
	resultado varchar(100),
	foreign key (id_partido) references partidos (id_partido)
)engine=innodb;

create table contactos(
	id_contanto int auto_increment primary key,
    comentario varchar(500),
    usuario varchar(100),
    foreign key (usuario) references usuarios (usuario)
)engine=innodb;

insert into perfil (codigo, descripcion) values ('ADM01','Administrador');
insert into perfil (codigo, descripcion) values ('U0001','Usuario');


insert into usuarios (usuario,nombre,apellidos,clave,email,perfil,fecha_nacimiento,medias) values ('u1','Pepe','Perez Vara','356a192b7913b04c54574d18c28d46e6395428ab','aga@correo.es','ADM01','2000-01-01',0);
insert into usuarios (usuario,nombre,apellidos,clave,email,perfil,fecha_nacimiento,medias) values ('u2','Manuela','Soria Rio','da4b9237bacccdf19c0760cab7aec4a8359010b0','jgc@correo.es','U0001','1996-05-10',0);

insert into pistas (nombre_pista) values ('WPT');

delimiter &&
create procedure generaReservas(in numPista int)
begin
	declare contPista int default 1;
    declare contDia int default 1;
    
     while contPisa <= numPista do
			while contDia <= 7  do
				insert into reservas (id_pista,fecha_reserva,hora_reserva,reservado) values(contPista,DATE_ADD(CURDATE(),INTERVAL contDia DAY),'10:00-11:30',False);
                insert into reservas (id_pista,fecha_reserva,hora_reserva,reservado) values(contPista,DATE_ADD(CURDATE(),INTERVAL contDia DAY),'11:30-13:00',False);
                insert into reservas (id_pista,fecha_reserva,hora_reserva,reservado) values(contPista,DATE_ADD(CURDATE(),INTERVAL contDia DAY),'13:00-14:30',False);
                insert into reservas (id_pista,fecha_reserva,hora_reserva,reservado) values(contPista,DATE_ADD(CURDATE(),INTERVAL contDia DAY),'14:30-16:00',False);
                insert into reservas (id_pista,fecha_reserva,hora_reserva,reservado) values(contPista,DATE_ADD(CURDATE(),INTERVAL contDia DAY),'16:00-17:30',False);
                insert into reservas (id_pista,fecha_reserva,hora_reserva,reservado) values(contPista,DATE_ADD(CURDATE(),INTERVAL contDia DAY),'17:30-19:00',False);
                insert into reservas (id_pista,fecha_reserva,hora_reserva,reservado) values(contPista,DATE_ADD(CURDATE(),INTERVAL contDia DAY),'19:00-20:30',False);
                insert into reservas (id_pista,fecha_reserva,hora_reserva,reservado) values(contPista,DATE_ADD(CURDATE(),INTERVAL contDia DAY),'20:30-22:00',False);
                insert into reservas (id_pista,fecha_reserva,hora_reserva,reservado) values(contPista,DATE_ADD(CURDATE(),INTERVAL contDia DAY),'22:00-23:30',False);
				set contDia = contDia +1;
			end while;
        set contPista = contPista +1;
    end while;
  
end &&
delimiter ;


drop event if exists creaReservas;
create event if  not exists creaReservas on schedule
every 1 week
starts '2022-12-16 9:58:00'
do 
	SELECT @numPista := count(id_pista) from pistas; 
	call generaReservas(@numPista);
show events;
SELECT @numPista := count(id_pista) from pistas; 
call generaReservas(@numPista);