CREATE TABLE PARTICULIER (
    login_p varchar PRIMARY KEY,
    mdp varchar NOT NULL,
    nom varchar NOT NULL,
    prenom varchar NOT NULL,
    mel varchar UNIQUE NOT NULL,
    constraint c_mdp_part CHECK (char_length(mdp) >= 8),
    constraint c_mel_part CHECK (mel LIKE '%@%.%')
);

/* PARTICULIER O.K.*/

CREATE TABLE EXPERT (
    login_ex varchar PRIMARY KEY,
    mdp varchar NOT NULL,
    nom varchar NOT NULL,
    prenom varchar NOT NULL,
    mel varchar UNIQUE NOT NULL,
    lieuTravail varchar,
    nbExpertises int,
    constraint c_nbExpertises CHECK (nbExpertises >= 0),
    constraint c_mdp_ex CHECK (char_length(mdp) >= 8),
    constraint c_mel_ex CHECK (mel LIKE '%@%.%')
);

/* EXPERT O.K.*/

CREATE TABLE ADMINISTRATEUR (
    login_ad varchar PRIMARY KEY,
    mdp varchar NOT NULL,
    nom varchar NOT NULL, 
    prenom varchar NOT NULL,
    mel varchar NOT NULL,
    constraint c_mdp_admin CHECK (char_length(mdp) >= 8),
    constraint c_mel_admin CHECK (mel LIKE '%@%.%')
);

/* ADMINISTRATEUR O.K. */

CREATE TABLE FOSSILE (
    id serial PRIMARY KEY,     
    nom varchar NOT NULL,
    etat varchar NOT NULL,
    longueur float,
    largeur float,
    hauteur float,
    description varchar NOT NULL,
    constraint c_etat CHECK (etat IN ('D', 'B', 'I'))
);

CREATE TABLE FOSSILE_IMAGE (
    id int references FOSSILE(id),
    image varchar,
    constraint c_primkey_foss_image PRIMARY KEY (id, image)
);


/* FOSSILE O.K.*/

CREATE TABLE ENCHERE ( -- EN COURS
    id varchar, -- login + numFossile
    vendeur varchar references PARTICULIER(login_p),
    fossile int references FOSSILE(id),
    prixDep float NOT NULL,
    prixActuel float CHECK(prixActuel >= prixDep),
    souhaitExpertise boolean NOT NULL,
    datePublication timestamp NOT NULL,
    duree interval NOT NULL,
    dateFin timestamp NOT NULL,
    /* Contrainte nécessaire pour durée : supérieur à 48h*/
    suivi boolean NOT NULL, 
    constraint c_primkey_enchere PRIMARY KEY (id, vendeur) 
);

CREATE TABLE EXPERTISE (
    idEnchere varchar,
    vendeur varchar,
    expert varchar references EXPERT(login_ex),
    infoExp varchar,
    constraint c_primkey_expertise PRIMARY KEY (idEnchere, vendeur),
    constraint c_foreign_expertise FOREIGN KEY (idEnchere, vendeur) REFERENCES ENCHERE(id, vendeur)
);  

/* EXPERTISE O.K. */

CREATE TABLE ATTENTE_EXPERTISE ( -- ENCHERE EN ATTENTE D'EXPERTISE
    enchere_id varchar,
    enchere_vend varchar,
    constraint c_primkey_att_expertise PRIMARY KEY(enchere_id, enchere_vend),
    constraint c_foreign_att_expertise FOREIGN KEY (enchere_id, enchere_vend) REFERENCES ENCHERE(id, vendeur)
);

/* ATTENTE_EXPERTISE O.K. */

CREATE TABLE ENCHERISSEURS ( 
    encherisseur varchar references PARTICULIER(login_p),
    enchere_id varchar,
    offre float,
    constraint c_primkey_encherisseurs PRIMARY KEY (encherisseur, enchere_id, enchere_vend, offre),
    constraint c_foreign_encherisseurs FOREIGN KEY (enchere_id, enchere_vend) REFERENCES ENCHERE(id, vendeur)
);

/* ENCHERISSEURS O.K. */




