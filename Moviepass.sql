CREATE DATABASE Moviepass;
USE Moviepass;

SELECT * FROM genresxmovies;


CREATE TABLE IF NOT EXISTS cinemas(
Id_cinema INT NOT NULL AUTO_INCREMENT,
C_name VARCHAR(30) NOT NULL,
Capacity SMALLINT NOT NULL,
C_address VARCHAR(20) NOT NULL,
TicketPrice SMALLINT NOT NULL,
CONSTRAINT `PK-Id_cinema` PRIMARY KEY (Id_cinema),
CONSTRAINT unq_C_name UNIQUE (C_name),
CONSTRAINT unq_C_address UNIQUE (C_address)
);

DROP DATABASE Moviepass;
DROP TABLE genres;
CREATE TABLE IF NOT EXISTS movies(
Id_movie INT NOT NULL,
Id_genre INT NOT NULL,
M_name VARCHAR(30) NOT NULL,    
Poster_path VARCHAR(200)  NOT NULL,
Title VARCHAR(30) NOT NULL,
CONSTRAINT `PK-Id_movie` PRIMARY KEY (Id_movie),
CONSTRAINT `FK-Id_genre` FOREIGN KEY (Id_genre) REFERENCES genres (Id_genre)
);

CREATE TABLE IF NOT EXISTS genres(
Id_genre INT NOT NULL,
G_name VARCHAR(30) NOT NULL,
CONSTRAINT `PK-Id_genre` PRIMARY KEY (Id_genre)
);

CREATE TABLE IF NOT EXISTS genresXmovies(
Id_genresXmovies INT NOT NULL AUTO_INCREMENT,
Id_movie INT NOT NULL,
Id_genre INT NOT NULL,
CONSTRAINT `PK-Id_genresXmovies` PRIMARY KEY (Id_genresXmovies),
CONSTRAINT `FK-Id_movie` FOREIGN KEY (Id_movie) REFERENCES movies (Id_movie),
CONSTRAINT `FK-Id_genre` FOREIGN KEY (Id_genre) REFERENCES genres (Id_genre)
);

/*INSERT INTO genres(Id_genre, G_name) VALUES (28,"Action"), (12,"Adventure" ), (, ), (, ), (, ),
(, ),*/

CREATE TABLE IF NOT EXISTS users(
UserId INT NOT NULL AUTO_INCREMENT,
UserName VARCHAR(30) NOT NULL,
UserEmail VARCHAR(30) NOT NULL,
UserLastName VARCHAR(30) NOT NULL,
UserPassword VARCHAR(30) NOT NULL,
UserGender VARCHAR(40) NOT NULL,
UserDni BIGINT NOT NULL,
CONSTRAINT `PK-Id_users` PRIMARY KEY (UserId)
);



DESCRIBE users;