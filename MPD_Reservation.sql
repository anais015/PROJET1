/*creer table*/

CREATE TABLE Client(
id_client int(11) NOT NULL AUTO_INCREMENT,
nom varchar(50) NOT NULL,
prenom varchar(50) NOT NULL,
email varchar(50) NOT NULL,
password varchar(50) NOT NULL,
role varchar(50) DEFAULT 'NOTADMIN',
ref_tarif int(11) NULL,
primary key (id_client)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Salle(
id_salle int(11) NOT NULL AUTO_INCREMENT,
nom varchar(50) NOT NULL,
nb_place varchar(50) NOT NULL,
ref_film int(11) NULL,
primary key (id_salle)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Film(
id_film int(11) NOT NULL AUTO_INCREMENT,
titre varchar(50) NOT NULL,
annee varchar(20) NOT NULL,
description varchar(1000) NOT NULL,
primary key (id_film)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Tarif(
id_tarif int(11) NOT NULL AUTO_INCREMENT,
nom varchar(50) NOT NULL,
prix decimal(8) NOT NULL,
description varchar(1000) NOT NULL,
primary key (id_tarif)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Reservation(
id_reservation int(11) NOT NULL AUTO_INCREMENT,
nb_place int(11) NOT NULL,
payment varchar(50) NOT NULL,
date_reservation date NOT NULL,
ref_salle int(11) NOT NULL,
ref_client int(11) NOT NULL,
primary key (id_reservation)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*ajouter foreign key*/

ALTER TABLE Reservation 
ADD CONSTRAINT fk_reservation_client FOREIGN KEY(ref_client) REFERENCES Client(id_client),
ADD CONSTRAINT fk_reservation_salle FOREIGN KEY(ref_salle) REFERENCES Salle(id_salle);

ALTER TABLE Client 
ADD CONSTRAINT fk_client_tarif FOREIGN KEY(ref_tarif) REFERENCES Tarif(id_tarif);

ALTER TABLE Salle
ADD CONSTRAINT fk_salle_tarif FOREIGN KEY(ref_tarif) REFERENCES Tarif(id_tarif);

/*insert*/

INSERT INTO film (titre, annee, description)
VALUES ('Sonic le film', '2020', 'Un film avec Sonic');

INSERT INTO film (titre, annee, description)
VALUES ('PIXELS', '2015', 'Pour les vrais gamers');

INSERT INTO film (titre, annee, description)
VALUES ('Le seigneur des anneaux', '2001', 'The lord of the ring');

INSERT INTO film (titre, annee, description)
VALUES ('Le hobbit', '2012', 'Petit mais costaud');

INSERT INTO film (titre, annee, description)
VALUES ('Les Tuches', '2011', 'La Famille de Bouzolles');

INSERT INTO salle (nom, nb_place)
VALUES ('Rouge', '30');

INSERT INTO salle (nom, nb_place)
VALUES ('Bleue', '60');

INSERT INTO salle (nom, nb_place)
VALUES ('Jaune', '120');

INSERT INTO salle (nom, nb_place)
VALUES ('Vert', '60');

INSERT INTO salle (nom, nb_place)
VALUES ('Blanc', '120');

INSERT INTO tarif (nom, prix, description)
VALUES ('Tarif jeune', '5', 'Pour les enfants, jeunes et étudiants');

INSERT INTO tarif (nom, prix, description)
VALUES ('Tarif Adulte', '10', 'Pour Adulte');

