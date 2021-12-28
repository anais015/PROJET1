/*creer table*/

CREATE TABLE Client(
id_client int(11) NOT NULL AUTO_INCREMENT,
nom varchar(50) NOT NULL,
prenom varchar(50) NOT NULL,
email varchar(50) NOT NULL,
password varchar(50) NOT NULL,
ref_tarif int(11) NULL,
primary key (id_client)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Salle(
id_salle int(11) NOT NULL AUTO_INCREMENT,
nom varchar(50) NOT NULL,
nb_place varchar(50) NOT NULL,
ref_tarif int(11)  NULL,
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
ref_salle int(11) NOT NULL,
ref_client int(11) NOT NULL,
primary key (ref_salle,ref_client)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE Projection(
ref_salle int(11) NOT NULL,
ref_film int(11) NOT NULL,
primary key (ref_salle,ref_film)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*ajouter foreign key*/

ALTER TABLE Reservation 
ADD CONSTRAINT fk_reservation_client FOREIGN KEY(ref_client) REFERENCES Client(id_client),
ADD CONSTRAINT fk_reservation_salle FOREIGN KEY(ref_salle) REFERENCES Salle(id_salle);

ALTER TABLE Projection 
ADD CONSTRAINT fk_projection_film FOREIGN KEY(ref_film) REFERENCES Film(id_film),
ADD CONSTRAINT fk_projection_salle FOREIGN KEY(ref_salle) REFERENCES Salle(id_salle);

ALTER TABLE Client 
ADD CONSTRAINT fk_client_tarif FOREIGN KEY(ref_tarif) REFERENCES Tarif(id_tarif);

ALTER TABLE Salle
ADD CONSTRAINT fk_salle_tarif FOREIGN KEY(ref_tarif) REFERENCES Tarif(id_tarif);





