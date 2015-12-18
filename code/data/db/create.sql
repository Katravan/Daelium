CREATE TABLE Lieu (
  idLieu        SERIAL PRIMARY KEY,
  noml          VARCHAR(255) NOT NULL,
  description   VARCHAR(1000),
  pays          VARCHAR(255),
  region        VARCHAR(255),
  ville         VARCHAR(255),
  codePostal    numeric(5),
  adresse       VARCHAR(255),
  latitude      decimal,
  longitude     decimal
);
CREATE TABLE Personne (
  idPersonne     SERIAL PRIMARY KEY,
  nomp            VARCHAR (255) NOT NULL,
  prenom         VARCHAR (255),
  emailcontact   VARCHAR (255) NOT NULL,
  tel            numeric(10),
  adresse        BIGINT,
  FOREIGN KEY (adresse) references Lieu(idLieu)
);

CREATE TABLE Utilisateur (
  idUtilisateur SERIAL PRIMARY KEY,
  emailCompte VARCHAR(255) NOT NULL,
  mdp VARCHAR(255) NOT NULL,
  googleToken TEXT,
  FOREIGN KEY (idUtilisateur) references Personne(idPersonne)
);

CREATE TABLE Artiste (
  idArtiste     BIGINT PRIMARY KEY,
  dateNaissance date,
  paiement      integer,
  rib           VARCHAR(255),
  ordreCheque   VARCHAR(255),
  FOREIGN KEY (idArtiste) references Personne(idPersonne)
);

CREATE TABLE Booker (
  idBooker BIGINT PRIMARY KEY,
  FOREIGN KEY (idBooker) references Utilisateur(idUtilisateur)
);

CREATE TABLE Organisateur (
  idOrganisateur BIGINT PRIMARY KEY,
  FOREIGN KEY (idOrganisateur) references Utilisateur(idUtilisateur)
);

CREATE TABLE Contact (
  Proprietaire  BIGINT,
  idContact     integer,
  notes         VARCHAR(255),
  PRIMARY KEY (Proprietaire,idContact),
  FOREIGN KEY (Proprietaire) references Utilisateur(idUtilisateur)
);


CREATE TABLE Contact_System (
  contactProprietaire BIGINT,
  idContact           integer,
  idPersonne          BIGINT,
  PRIMARY KEY (ContactProprietaire,idContact),
  FOREIGN KEY (ContactProprietaire,idContact) references Contact(Proprietaire,idContact),
  FOREIGN KEY (idPersonne) references Personne(idPersonne)
);

CREATE TABLE Contact_exterieur (
  contactProprietaire BIGINT,
  idContact           integer,
  nom                 VARCHAR(255) NOT NULL,
  mail                VARCHAR(255) UNIQUE,
  tel                 numeric(10),
  PRIMARY KEY (ContactProprietaire,idContact),
  FOREIGN KEY (ContactProprietaire,idContact) references Contact(Proprietaire,idContact)
);

CREATE TABLE Manifestation (
  idManif           SERIAL PRIMARY KEY,
  type              VARCHAR(255),
  description       VARCHAR(255),
  dateDebut         DATE NOT NULL,
  dateFin           DATE NOT NULL,
  prixPublic        integer,
  lienImageOfficiel VARCHAR(255),
  facebook          VARCHAR(255),
  google            VARCHAR(255),
  twitter           VARCHAR(255),
  ficheCom          VARCHAR(255),
  createur          BIGINT,
  lieu              BIGINT,
  FOREIGN KEY (createur) references Organisateur(idOrganisateur),
  FOREIGN KEY (lieu) references Lieu(idLieu)
);

CREATE TABLE Groupe (
  idGroupe          SERIAL PRIMARY KEY,
  nomg              VARCHAR(255) NOT NULL,
  email             VARCHAR(255),
  lienImageOfficiel VARCHAR(255),
  facebook          VARCHAR(255),
  google            VARCHAR(255),
  twitter           VARCHAR(255),
  soundcloud        VARCHAR(255),
  lecteur           VARCHAR(255),
  ficheCom          VARCHAR(255),
  adresse           BIGINT,
  FOREIGN KEY (adresse) references Lieu(idLieu)
);

CREATE TABLE Document (
  idDoc           SERIAL PRIMARY KEY,
  idUtilisateur   BIGINT,
  nom             VARCHAR(255) NOT NULL,
  dateCreation    DATE,
  datemodif       DATE,
  emplacement     varchar(255),
  FOREIGN KEY (idUtilisateur) references Utilisateur(idUtilisateur)
);

CREATE TABLE Evenement (
  idEvene       SERIAL PRIMARY KEY,
  nom           VARCHAR(255),
  datedebut     DATE NOT NULL,
  datefin       DATE NOT NULL,
  heuredebut    TIME(6) NOT NULL,
  heurefin      TIME(6) NOT NULL,
  description   VARCHAR(255),
  lieu          integer references Lieu(idLieu),
  createur      integer NOT NULL references Utilisateur(idUtilisateur)
);

CREATE TABLE Contact_Evenement (
  idEvene BIGINT references Evenement(idEvene),
  contactProprietaire  BIGINT,
  idContact     integer,
  PRIMARY KEY(idEvene,contactProprietaire,idContact),
  FOREIGN KEY (idContact,contactProprietaire) references Contact(idContact,Proprietaire)
);


CREATE TABLE Creneau (
  idManif         BIGINT,
  idGroupe        BIGINT,
  dateC           DATE,
  heureDebut      TIME(6),
  heureFin        TIME(6),
  heureDebutTest  TIME(6),
  heureFinTest    TIME(6),
  PRIMARY KEY (idManif,idGroupe,heureDebut),
  FOREIGN KEY (idManif) references Manifestation(idManif),
  FOREIGN KEY (idGroupe) references Groupe(idGroupe)
);

CREATE TABLE Groupe_Artiste (
  idGroupe  BIGINT,
  idArtiste BIGINT,
  PRIMARY KEY (idGroupe,idArtiste),
  FOREIGN KEY (idGroupe) references Groupe(idGroupe),
  FOREIGN KEY (idArtiste) references Artiste(idArtiste)
);

CREATE TABLE Negociation (
  idNegociation SERIAL PRIMARY KEY,
  idBooker BIGINT,
  idManif BIGINT,
  idGroupe BIGINT,
  idOrganisateur BIGINT,
  etat integer,
  Unique (idBooker,idManif,idGroupe,idOrganisateur),
  FOREIGN KEY (idBooker) references Booker(idBooker),
  FOREIGN KEY (idManif) references Manifestation(idManif),
  FOREIGN KEY (idGroupe) references Groupe(idGroupe),
  FOREIGN KEY (idOrganisateur) references Organisateur(idOrganisateur)
);

CREATE TABLE Negociation_Documents (
  idNegociation BIGINT,
  idDoc BIGINT,
  PRIMARY KEY (idNegociation,idDoc),
  FOREIGN KEY (idNegociation) references Negociation(idNegociation),
  FOREIGN KEY (idDoc) references Document(idDoc)
);

CREATE TABLE Message (                  -- à revoir
  idMessage SERIAL PRIMARY KEY,
  expediteur BIGINT,
  receveur  BIGINT,
  etat integer,
  nom varchar(255),
  contenu varchar(255),
  reponse BIGINT,
  dateenvoi DATE,
  FOREIGN KEY (receveur) references Utilisateur(idUtilisateur),
  FOREIGN KEY (expediteur) references Utilisateur(idUtilisateur)
);

CREATE TABLE Message_Tag (
  nomt VARCHAR(255) NOT NULL,
  idMessage BIGINT,
  PRIMARY KEY (nomt,idMessage),
  FOREIGN KEY (idMessage) references Message(idMessage)
);

CREATE TABLE Contact_Tag (
  nomt VARCHAR(255) NOT NULL,
  proprietaire  BIGINT,
  idContact     integer,
  PRIMARY KEY (nomt,Proprietaire,idContact),
  FOREIGN KEY (idContact,Proprietaire) references Contact(idContact,Proprietaire)
);

CREATE TABLE Negociation_Messages (
  idNegociation BIGINT,
  idMessage BIGINT,
  PRIMARY KEY (idNegociation,idMessage),
  FOREIGN KEY (idNegociation) references Negociation(idNegociation),
  FOREIGN KEY (idMessage) references Message(idMessage)
);


CREATE TABLE Booker_Groupe (
  idBooker BIGINT,
  idGroupe BIGINT,
  PRIMARY KEY (idBooker,idGroupe),
  FOREIGN KEY (idBooker) references Booker(idBooker),
  FOREIGN KEY (idGroupe) references Groupe(idGroupe)
);


CREATE TABLE Groupe_Genre (
  idGroupe BIGINT,
  nomg  VARCHAR(255),
  PRIMARY KEY (nomg,idGroupe),
  FOREIGN KEY (idGroupe) references Groupe(idGroupe)
);

CREATE TABLE Manifestation_Genre (
  idManif BIGINT,
  nomg  VARCHAR(255),
  PRIMARY KEY (nomg,idManif),
  FOREIGN KEY (idManif) references Manifestation(idManif)
);
