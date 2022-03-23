Create database vzgBiologija;
USE vzgBiologija;
DROP TABLE skyrius;
DROP TABLE postas;
DROP TABLE Admins;

CREATE TABLE skyrius(
ID int Primary key auto_increment,
Pavadinimas varchar(45)
);

INSERT INTO `skyrius` (`Pavadinimas`) VALUES ('paveldejimas');
INSERT INTO `skyrius` (`Pavadinimas`) VALUES ('apykaita');
INSERT INTO `skyrius` (`Pavadinimas`) VALUES ('sveikata');
INSERT INTO `skyrius` (`Pavadinimas`) VALUES ('homeostaze');
INSERT INTO `skyrius` (`Pavadinimas`) VALUES ('evoliucija');
INSERT INTO `skyrius` (`Pavadinimas`) VALUES ('ekologija');
INSERT INTO `klase` (`Pavadinimas`) VALUES ('pirmokams');
INSERT INTO `klase` (`Pavadinimas`) VALUES ('antrokams');
INSERT INTO `klase` (`Pavadinimas`) VALUES ('treciokams');
INSERT INTO `klase` (`Pavadinimas`) VALUES ('ketvirtokams');

CREATE TABLE postas(
ID int primary key auto_increment,
Pavadinimas varchar(45),
Failas varchar(100),
KlaseID int,
SkyriusID int,
Skyrius varchar(45),
Klase varchar(45),
FOREIGN KEY (SkyriusID) references Skyrius(ID),
FOREIGN KEY (KlaseID) references Klase(ID)
);

CREATE TABLE Admins(
ID int primary key auto_increment,
Vardas varchar(45),
Slaptazodis varchar(100),
SaugusSlap bool
);

CREATE TABLE klase(
ID int Primary key auto_increment,
Pavadinimas varchar(45)
);

select * FROM postas;

INSERT INTO Admins(Vardas, Slaptazodis, SaugusSlap) VALUES ("DaivaP", "DaivaP", false);
INSERT INTO Admins(Vardas, Slaptazodis, SaugusSlap) VALUES ("KarolinaM", "KarolinaM", false);