create database nba;
use nba;
grant all on nba.* to javier;

create table losAngelesLakers (
    id int primary key auto_increment,
    jugador VARCHAR(30) NOT NULL,
    edad INT(2) NOT NULL,
    puntos FLOAT(3) NOT NULL,
    asistencias FLOAT(3) NOT NULL,
    rebotes FLOAT(3) NOT NULL,
    fechadebut date NOT NULL,
);

INSERT INTO LosAngelesLakers VALUES ("Lebron James", "38", "25.9", "6.6", "8.6", "2003-10-16");
INSERT INTO LosAngelesLakers VALUES ("Anthony Davis", "29", "27.2", "2.7", "12.6", "2012-10-20");
INSERT INTO LosAngelesLakers VALUES ("Rusell Westbrook", "34", "15.0", "7.4", "5.3", "2008-11-02");
INSERT INTO LosAngelesLakers VALUES ("Lonnie Walker IV", "23", "16.5", "1.8", "5.3", "2018-12-13");
INSERT INTO LosAngelesLakers VALUES ("Wenyen Gabriel", "25", "5.4", "0.7", "3.7", "2020-11-30");
INSERT INTO LosAngelesLakers VALUES ("Austin Reaves", "24", "10.7", "2.1", "3.2", "2021-10-07");
INSERT INTO LosAngelesLakers VALUES ("Dennis Schroder", "29", "8.4", "3.6", "1.7", "2021-10-07");
INSERT INTO LosAngelesLakers VALUES ("Thomas Bryant", "25", "8.6", "0.7", "4.3", "2017-11-09");
INSERT INTO LosAngelesLakers VALUES ("Troy Brown Jr.", "23", "7.9", "0.9", "4.9", "2018-12-20");
INSERT INTO LosAngelesLakers VALUES ("Kendrick Nunn", "27", "5.5", "1.3", "1.4", "2015-10-23");