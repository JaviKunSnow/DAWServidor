create database nba;
use nba;
grant all on nba.* to javier;
create table ConferenciaOeste (
    id int primary key auto_increment,
    equipo VARCHAR(50) NOT NULL,
    ciudad VARCHAR(40) NOT NULL,
    fechacreacion date NOT NULL,
);

INSERT INTO ConferenciaOeste VALUES ("Los Angeles Lakers", "Los Angeles","1947-06-06");
INSERT INTO ConferenciaOeste VALUES ("Los Angeles Clippers", "Los Angeles","1970-11-06");
INSERT INTO ConferenciaOeste VALUES ("Dallas Mavericks", "Dallas","1980-12-12");
INSERT INTO ConferenciaOeste VALUES ("Los Angeles Lakers", "Los Angeles","1947-06-06");
INSERT INTO ConferenciaOeste VALUES ("Los Angeles Lakers", "Los Angeles","1947-06-06");


create table ConferenciaEste (
    id int primary key auto_increment,
    equipo VARCHAR(50) NOT NULL,
    ciudad VARCHAR(40) NOT NULL,
    fechacreacion date NOT NULL,
);