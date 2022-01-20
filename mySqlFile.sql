Create database vzgBiologija;
USE vzgBiologija;
DROP TABLE skyrius;
DROP TABLE postas;
DROP TABLE Admins;

CREATE TABLE skyrius(
ID int Primary key auto_increment,
Pavadinimas varchar(45)
);

CREATE TABLE postas(
ID int primary key auto_increment,
Pavadinimas varchar(45),
Failas varchar(100),
Klase varchar(45),
SkyriusID int,
Skyrius varchar(45),
FOREIGN KEY (SkyriusID) references Skyrius(ID)
);

CREATE TABLE Admins(
ID int primary key auto_increment,
Vardas varchar(45),
Slaptazodis varchar(100),
SaugusSlap bool
);

select * FROM postas;

INSERT INTO Admins(Vardas, Slaptazodis, SaugusSlap) VALUES ("DaivaP", "DaivaP", false);
INSERT INTO Admins(Vardas, Slaptazodis, SaugusSlap) VALUES ("KarolinaM", "KarolinaM", false);