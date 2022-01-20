Create database vzgBiologija;
USE vzgBiologija;
DROP TABLE skyrius;
DROP TABLE postas;

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
FOREIGN KEY (SkyriusID) references Skyrius(ID)
);

CREATE TABLE Admins(
Vardas varchar(45),
Slaptazodis varchar(45)
);

select * FROM postas;

INSERT INTO Admins(Vardas, Slaptažodis) VALUES ("DaivaP", "DaivaP");