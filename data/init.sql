create database db_produit;

use db_produit;

CREATE TABLE notationP (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    note int(10) NOT NULL,
    commentaire VARCHAR(200) NOT NULL,
    ville VARCHAR(50),
    date TIMESTAMP
  );